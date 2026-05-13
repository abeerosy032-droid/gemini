let chartInstance = null;

export function updateChart(data, unit) {
    const ctx = document.getElementById('forecast-chart').getContext('2d');
    
    // Get next 8 intervals (24 hours)
    const chartData = data.list.slice(0, 8);
    const labels = chartData.map(item => {
        const date = new Date(item.dt * 1000);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    });
    const temps = chartData.map(item => Math.round(item.main.temp));

    if (chartInstance) {
        chartInstance.destroy();
    }

    const unitSymbol = unit === 'metric' ? '°C' : '°F';

    chartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: `Temperature (${unitSymbol})`,
                data: temps,
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: { color: '#ffffff' }
                }
            },
            scales: {
                x: {
                    ticks: { color: '#e2e8f0' },
                    grid: { color: 'rgba(255, 255, 255, 0.1)' }
                },
                y: {
                    ticks: { color: '#e2e8f0' },
                    grid: { color: 'rgba(255, 255, 255, 0.1)' }
                }
            }
        }
    });
}

// Function to handle unit conversion without re-fetching
export function convertChartData(currentUnit) {
    if (!chartInstance) return;
    
    const datasets = chartInstance.data.datasets;
    if (!datasets || datasets.length === 0) return;
    
    const temps = datasets[0].data;
    
    // Convert logic
    // If current is metric, we are switching FROM imperial TO metric. But wait, currentUnit is the target unit.
    // If target is metric, previous was imperial: (F - 32) * 5/9
    // If target is imperial, previous was metric: (C * 9/5) + 32
    
    const newTemps = temps.map(temp => {
        if (currentUnit === 'metric') {
            return Math.round((temp - 32) * 5 / 9);
        } else {
            return Math.round((temp * 9 / 5) + 32);
        }
    });
    
    datasets[0].data = newTemps;
    datasets[0].label = `Temperature (${currentUnit === 'metric' ? '°C' : '°F'})`;
    chartInstance.update();
}