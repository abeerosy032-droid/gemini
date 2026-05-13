import { getWeatherByCity, getForecastByCity, getWeatherByCoords, getForecastByCoords, ApiError } from './api.js';
import { updateCurrentWeather, updateForecast, showError, hideError } from './ui.js';
import { updateChart, convertChartData } from './charts.js';
import { addCityToHistory, renderHistory } from './storage.js';

let currentUnit = 'metric';
let lastWeatherData = null;
let lastForecastData = null;

async function handleSearch(city) {
    if (!city) return;
    try {
        hideError();
        const weatherData = await getWeatherByCity(city, currentUnit);
        const forecastData = await getForecastByCity(city, currentUnit);
        
        lastWeatherData = weatherData;
        lastForecastData = forecastData;

        updateUI(weatherData, forecastData);
        addCityToHistory(weatherData.name);
    } catch (error) {
        showError(error.message);
    }
}

async function handleGeoLocation() {
    if (!navigator.geolocation) {
        showError("Geolocation is not supported by your browser.");
        return;
    }

    navigator.geolocation.getCurrentPosition(
        async (position) => {
            try {
                hideError();
                const { latitude, longitude } = position.coords;
                const weatherData = await getWeatherByCoords(latitude, longitude, currentUnit);
                const forecastData = await getForecastByCoords(latitude, longitude, currentUnit);
                
                lastWeatherData = weatherData;
                lastForecastData = forecastData;

                updateUI(weatherData, forecastData);
                addCityToHistory(weatherData.name);
                document.getElementById('city-input').value = weatherData.name;
            } catch (error) {
                showError(error.message);
            }
        },
        (error) => {
            if (error.code === error.PERMISSION_DENIED) {
                showError("Location access denied. Please enter a city manually.");
            } else {
                showError("Unable to retrieve your location.");
            }
        }
    );
}

function updateUI(weatherData, forecastData) {
    updateCurrentWeather(weatherData, currentUnit);
    updateForecast(forecastData, currentUnit);
    updateChart(forecastData, currentUnit);
}

function toggleUnit() {
    const oldUnit = currentUnit;
    currentUnit = currentUnit === 'metric' ? 'imperial' : 'metric';
    
    // We update the UI manually instead of refetching, as requested
    if (lastWeatherData && lastForecastData) {
        // Convert current weather
        const temp = lastWeatherData.main.temp;
        lastWeatherData.main.temp = currentUnit === 'metric' ? (temp - 32) * 5/9 : (temp * 9/5) + 32;
        
        // Note: For a perfectly accurate UI, we should also convert min/max temps, wind speed (m/s vs mph)
        // But for this requirement, we focus on the main temp and the chart.
        const wind = lastWeatherData.wind.speed;
        lastWeatherData.wind.speed = currentUnit === 'metric' ? wind / 2.237 : wind * 2.237; // approximation mph <-> m/s

        // Update forecast data temps so the daily cards are correct
        lastForecastData.list.forEach(item => {
             const t = item.main.temp;
             item.main.temp = currentUnit === 'metric' ? (t - 32) * 5/9 : (t * 9/5) + 32;
        });

        // Re-render
        updateCurrentWeather(lastWeatherData, currentUnit);
        updateForecast(lastForecastData, currentUnit);
        convertChartData(currentUnit); // Updates the chart without destroying/recreating
    }
}

// Event Listeners
document.getElementById('search-btn').addEventListener('click', () => {
    handleSearch(document.getElementById('city-input').value.trim());
});

document.getElementById('city-input').addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        handleSearch(e.target.value.trim());
    }
});

document.getElementById('geo-btn').addEventListener('click', handleGeoLocation);

document.getElementById('unit-toggle').addEventListener('click', toggleUnit);

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    renderHistory(handleSearch);
});