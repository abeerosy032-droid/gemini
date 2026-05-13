const STORAGE_KEY = 'weather_recent_cities';
const MAX_HISTORY = 5;

export function getHistory() {
    try {
        const stored = localStorage.getItem(STORAGE_KEY);
        return stored ? JSON.parse(stored) : [];
    } catch {
        return [];
    }
}

export function addCityToHistory(city) {
    if (!city) return;
    
    let history = getHistory();
    // Remove if exists to move it to the front
    history = history.filter(c => c.toLowerCase() !== city.toLowerCase());
    
    // Add to front
    history.unshift(city);
    
    // Keep only top N
    if (history.length > MAX_HISTORY) {
        history = history.slice(0, MAX_HISTORY);
    }
    
    localStorage.setItem(STORAGE_KEY, JSON.stringify(history));
    renderHistory();
}

export function renderHistory(onCityClick) {
    const list = document.getElementById('history-list');
    const history = getHistory();
    
    list.innerHTML = '';
    history.forEach(city => {
        const li = document.createElement('li');
        li.textContent = city;
        li.addEventListener('click', () => {
            document.getElementById('city-input').value = city;
            if (onCityClick) onCityClick(city);
        });
        list.appendChild(li);
    });
}