<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 40%;
            margin: 10px;
        }
        .charts {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        canvas {
            max-width: 100%;
            height: auto !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="charts">
            <div class="chart-container">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var chartData = <?= json_encode($grafik) ?>;

            var pieLabels = [];
            var pieData = [];

            chartData.pieChart.forEach(function(item) {
                pieLabels.push(item.PELANGGARAN);
                pieData.push(item.total_pelanggaran);
            });

            var barLabels = [];
            var barData = [];

            chartData.barChart.forEach(function(item) {
                var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                var month = monthNames[item.BULAN - 1];
                barLabels.push(month);
                barData.push(item.total_pelanggaran);
            });

            var pieCtx = document.getElementById('pieChart').getContext('2d');
            var barCtx = document.getElementById('barChart').getContext('2d');

            // Pie Chart
            var pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: pieLabels,
                    datasets: [{
                        label: 'Total Pelanggaran',
                        data: pieData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });

// Bar Chart
var barChart = new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: barLabels,
        datasets: [{
            label: 'Total Pelanggaran',
            data: barData,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                precision: 0, // Menghapus angka desimal
                ticks: {
                    callback: function(value, index, values) {
                        return value.toLocaleString(); // Ubah ke satuan
                    }
                }
            }
        }
    }
});


});
    </script>
</body>
</html>
