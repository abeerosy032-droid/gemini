const BASE_URL = 'https://api.openweathermap.org/data/2.5';

export class ApiError extends Error {
    constructor(message, type) {
        super(message);
        this.type = type;
    }
}

// --- MOCK DATA ---
const mockCurrentWeather = {
    "coord": { "lon": 36.2913, "lat": 33.5102 },
    "weather": [ { "id": 800, "main": "Clear", "description": "clear sky", "icon": "01d" } ],
    "base": "stations",
    "main": { "temp": 25.5, "feels_like": 25.0, "temp_min": 25.5, "temp_max": 25.5, "pressure": 1012, "humidity": 35 },
    "visibility": 10000,
    "wind": { "speed": 4.1, "deg": 280 },
    "clouds": { "all": 0 },
    "dt": 1690000000,
    "sys": { "type": 1, "id": 7594, "country": "SY", "sunrise": 1689990000, "sunset": 1690040000 },
    "timezone": 10800,
    "id": 163843,
    "name": "Damascus",
    "cod": 200
};

const mockForecastData = {
    "cod": "200",
    "message": 0,
    "cnt": 40,
    "list": []
};

// Generate fake forecast data for 5 days (every 3 hours)
let baseTime = Math.floor(Date.now() / 1000);
for (let i = 0; i < 40; i++) {
    // add some variation to temp
    let tempVar = Math.sin(i * 0.5) * 5 + 20; 
    let time = baseTime + (i * 3 * 3600);
    // make sure some have "12:00:00" for the daily cards
    let dt_txt = new Date(time * 1000).toISOString().replace('T', ' ').substring(0, 19);
    
    // Force daily times to hit 12:00:00 UTC at some point for the UI filter
    if (i % 8 === 4) {
        dt_txt = dt_txt.substring(0, 10) + ' 12:00:00';
    }

    mockForecastData.list.push({
        "dt": time,
        "main": { "temp": tempVar, "temp_min": tempVar - 2, "temp_max": tempVar + 2, "pressure": 1012, "sea_level": 1012, "grnd_level": 940, "humidity": 40, "temp_kf": 0 },
        "weather": [ { "id": 800, "main": "Clear", "description": "clear sky", "icon": "01d" } ],
        "clouds": { "all": 0 },
        "wind": { "speed": 3.5, "deg": 280, "gust": 4.0 },
        "visibility": 10000,
        "pop": 0,
        "sys": { "pod": "d" },
        "dt_txt": dt_txt
    });
}
// -----------------

// No API key needed in Mock mode
function getApiKey() {
    return 'mock-mode';
}

async function fetchMockData(type, params) {
    // Simulate network delay
    await new Promise(resolve => setTimeout(resolve, 500));

    if (params.q && params.q.toLowerCase() === 'error') {
        throw new ApiError('City not found.', 'not_found');
    }

    let data = type === 'weather' ? JSON.parse(JSON.stringify(mockCurrentWeather)) : JSON.parse(JSON.stringify(mockForecastData));

    // Dynamic mock response based on city or coords
    if (params.q) {
        data.name = params.q.charAt(0).toUpperCase() + params.q.slice(1);
        if (data.city) data.city.name = data.name;
    } else if (params.lat && params.lon) {
        data.name = "My Location";
        if (data.city) data.city.name = data.name;
    }

    // Handle Imperial vs Metric correctly for the Mock initialization
    if (params.units === 'imperial') {
        if (type === 'weather') {
            data.main.temp = (data.main.temp * 9/5) + 32;
            data.wind.speed = data.wind.speed * 2.237;
        } else {
            data.list.forEach(item => {
                item.main.temp = (item.main.temp * 9/5) + 32;
            });
        }
    }

    return data;
}

export async function getWeatherByCity(city, unit = 'metric') {
    return fetchMockData('weather', { q: city, units: unit });
}

export async function getForecastByCity(city, unit = 'metric') {
    return fetchMockData('forecast', { q: city, units: unit });
}

export async function getWeatherByCoords(lat, lon, unit = 'metric') {
    return fetchMockData('weather', { lat, lon, units: unit });
}

export async function getForecastByCoords(lat, lon, unit = 'metric') {
    return fetchMockData('forecast', { lat, lon, units: unit });
}