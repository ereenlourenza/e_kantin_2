var data = {
    labels: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5'],
    datasets: [{
        label: 'Data',
        backgroundColor: '#DE5D01', // Warna batang
        data: [12, 19, 3, 5, 2] // Data nilai
    }]
};

// Konfigurasi chart
var options = {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
};

// Inisialisasi chart
var ctx = document.getElementById('bar-chart').getContext('2d');
var barChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});