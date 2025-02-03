@extends('/layout')

@section('title', 'Analytic')

@section('content')

    <div>
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4">Insights des Profils</h1>

            <!-- Graphique des vues -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-lg font-semibold">Total Card Views</h2>
                <canvas id="viewsChart"></canvas>
            </div>

            <!-- Graphique des contacts échangés -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Contact Saves</h2>
                <canvas id="contactsChart"></canvas>
            </div>
        </div>

        <!-- Inclure Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <script>
            // Récupérer les données PHP dans JavaScript
            const days = @json($days);
            const viewsData = @json(array_values($viewsData));
            const contactsData = @json(array_values($contactsData));

            // Configuration du Graphique des vues
            new Chart(document.getElementById('viewsChart'), {
                type: 'line',
                data: {
                    labels: days,
                    datasets: [{
                        label: 'Card Views',
                        data: viewsData,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 7
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Configuration du Graphique des contacts échangés
            new Chart(document.getElementById('contactsChart'), {
                type: 'line',
                data: {
                    labels: days,
                    datasets: [{
                        label: 'Contact Saves',
                        data: contactsData,
                        borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 7
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </div>


@endsection
