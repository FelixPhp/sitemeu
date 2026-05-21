const cpuCtx = document.getElementById('cpuChart');
const ramCtx = document.getElementById('ramChart');

const cpuChart = new Chart(cpuCtx, {
    type: 'line',
    data: {
        labels: ['1', '2', '3', '4', '5'],
        datasets: [{
            label: 'CPU %',
            data: [20, 35, 40, 30, 50],
            borderColor: 'red'
        }]
    }
});

const ramChart = new Chart(ramCtx, {
    type: 'line',
    data: {
        labels: ['1', '2', '3', '4', '5'],
        datasets: [{
            label: 'RAM %',
            data: [60, 65, 70, 68, 75],
            borderColor: 'blue'
        }]
    }
});