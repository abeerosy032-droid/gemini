export function updateCurrentWeather(data, unit) {
    const container = document.getElementById('current-weather');
    const unitSymbol = unit === 'metric' ? '°C' : '°F';
    const iconUrl = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
    
    container.innerHTML = `
        <h2>${data.name}, ${data.sys.country}</h2>
        <img src="${iconUrl}" alt="${data.weather[0].description}">
        <div class="temp">${Math.round(data.main.temp)}${unitSymbol}</div>
        <div class="desc">${data.weather[0].description}</div>
        <div class="details">
            <span>Humidity: ${data.main.humidity}%</span>
            <span>Wind: ${data.wind.speed} ${unit === 'metric' ? 'm/s' : 'mph'}</span>
        </div>
    `;

    updateBackground(data.weather[0].main.toLowerCase());
}

export function updateForecast(data, unit) {
    const container = document.getElementById('forecast');
    container.innerHTML = '';
    const unitSymbol = unit === 'metric' ? '°C' : '°F';

    // Get one forecast per day (e.g., at 12:00:00)
    const dailyData = data.list.filter(item => item.dt_txt.includes('12:00:00'));

    dailyData.forEach(day => {
        const date = new Date(day.dt * 1000).toLocaleDateString(undefined, { weekday: 'short', month: 'short', day: 'numeric' });
        const iconUrl = `https://openweathermap.org/img/wn/${day.weather[0].icon}.png`;
        
        container.innerHTML += `
            <div class="forecast-card">
                <div>${date}</div>
                <img src="${iconUrl}" alt="${day.weather[0].description}">
                <div style="font-weight: bold; font-size: 1.2rem;">${Math.round(day.main.temp)}${unitSymbol}</div>
                <div style="font-size: 0.9rem; color: var(--text-secondary);">${day.weather[0].main}</div>
            </div>
        `;
    });
}

function updateBackground(condition) {
    const body = document.body;
    body.className = ''; // reset
    
    if (condition.includes('clear')) body.classList.add('weather-clear');
    else if (condition.includes('cloud')) body.classList.add('weather-clouds');
    else if (condition.includes('rain') || condition.includes('drizzle')) body.classList.add('weather-rain');
    else if (condition.includes('snow')) body.classList.add('weather-snow');
    else if (condition.includes('thunderstorm')) body.classList.add('weather-thunderstorm');
    else if (['mist', 'smoke', 'haze', 'dust', 'fog', 'sand', 'ash', 'squall', 'tornado'].includes(condition)) body.classList.add('weather-mist');
    else body.classList.add('weather-default');
}

export function showError(message) {
    const errorEl = document.getElementById('error-message');
    errorEl.textContent = message;
    errorEl.classList.remove('hidden');
    document.getElementById('dashboard').classList.add('hidden');
}

export function hideError() {
    document.getElementById('error-message').classList.add('hidden');
    document.getElementById('dashboard').classList.remove('hidden');
}