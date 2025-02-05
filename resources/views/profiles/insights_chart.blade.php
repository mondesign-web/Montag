@extends('/layout')
@section('title', 'Analytic')
@section('content')
    <div class="container mx-auto p-4">
        <style>
            canvas {
                display: block;
                height: auto !important;
                max-height: 100%;
                /* S'assure que le graphique occupe l'espace disponible */
            }
        </style>
        <h2 class="text-xl sm:text-2xl font-semibold mb-6 text-center">Analytics</h2>

        <!-- Conteneur des Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Graphique Circulaire -->
            <div class="p-6 bg-white rounded-lg shadow-md flex justify-center">
                <canvas id="insightsPieChart"></canvas>
            </div>

            <!-- Graphique en Barres -->
            <div class="p-6 bg-white rounded-lg shadow-md flex item-center">
                <canvas id="insightsBarChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Données pour les graphiques
            const dataValues = @json(array_values($data)).slice(1); // Exclure 'views'
            const labels = ["Contact Downloads", "Contact Exchanged", "Link Taps", "Share Links"];
            const backgroundColors = ["rgba(255, 99, 132, 0.5)", "rgba(153, 102, 255, 0.5)",
                "rgba(54, 162, 235, 0.5)", "rgba(75, 192, 192, 0.5)"
            ];
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
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 15,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    let value = tooltipItem.raw;
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
                        borderColor: ["#FF6384", "#9966FF", "#36A2EB", "#4BC0C0"],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {}
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 5
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
