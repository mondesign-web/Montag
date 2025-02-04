@extends('/layout')

@section('title', 'Analytic')

@section('content')



    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Analytics</h2>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <canvas id="insightsPieChart"></canvas>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <canvas id="insightsBarChart"></canvas>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('insightsChart').getContext('2d');

            const data = {
                labels: ["Vues", "Téléchargements", "Contacts échangés", "Clics sur liens"],
                datasets: [{
                    data: @json(array_values($data)), // Injecte les valeurs dynamiquement
                    backgroundColor: ["#4285F4", "#34A853", "#FBBC05", "#EA4335"],
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    let value = tooltipItem.raw;
                                    let total = data.datasets[0].data.reduce((a, b) => a + b, 0);
                                    let percentage = ((value / total) * 100).toFixed(1) + "%";
                                    return tooltipItem.label + ": " + percentage;
                                }
                            }
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });
    </script-->
    

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            //const dataValues = @json(array_values($data));
            const dataValues = @json(array_values($data)).slice(1);
            const labels = ["Contact_download", "Contact_Exchanged", "link_taps"];
            const backgroundColors = ["#34A853", "#FBBC05", "#EA4335"];
            const totalViews = @json($data['views']);

            // Graphique Circulaire
            const pieCtx = document.getElementById('insightsPieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    let value = tooltipItem.raw;
                                    //let total = dataValues.reduce((a, b) => a + b, 0);
                                    //let total = dataValues[0];
                                    let percentage = ((value / totalViews) * 100).toFixed(1) + "%";
                                    return tooltipItem.label + ": " + percentage;
                                }
                            }
                        }
                    }
                }
            });

            // Graphique en Barres
            const barCtx = document.getElementById('insightsBarChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Statistiques des interactions',
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        borderColor: ["#2A56C6", "#2E7D32", "#E6A700", "#D32F2F"],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>


@endsection
