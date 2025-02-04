@extends('/layout')

@section('title', 'Analytics')

@section('content')

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Analytics</h2>

        <div class="grid gap-6 md:grid-cols-2">
            <!-- Total Card Views -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold">Total Card Views</h3>
                <canvas id="cardViewsChart"></canvas>
            </div>

            <!-- Contact Saves -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold">Contact Saves</h3>
                <canvas id="contactSavesChart"></canvas>
            </div>

            <!-- Contact Exchanged -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold">Contact Exchanged</h3>
                <canvas id="contactExchangedChart"></canvas>
            </div>

            <!-- Link tap -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold">Link taps</h3>
                <canvas id="linkTapsChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--script>
        document.addEventListener("DOMContentLoaded", function() {
            const dates = @json($insights->pluck('date'));
            const views = @json($insights->pluck('views'));
            const contactExchanged = @json($insights->pluck('contact_exchanged'));
            const contactDownloads = @json($insights->pluck('contact_downloads'));
            const linkTaps = @json($insights->pluck('link_taps'));

            const ctxViews = document.getElementById("cardViewsChart").getContext("2d");
            new Chart(ctxViews, {
                type: "line",
                data: {
                    labels: dates,
                    datasets: [{
                        label: "Card Views",
                        data: views,
                        borderColor: "rgba(54, 162, 235, 1)",
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        fill: true
                    }]
                }
            });

            const ctxSaves = document.getElementById("contactSavesChart").getContext("2d");
            new Chart(ctxSaves, {
                type: "line",
                data: {
                    labels: dates,
                    datasets: [{
                        label: "Contact Saves",
                        data: contactDownloads,
                        borderColor: "rgba(75, 192, 192, 1)",
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        fill: true
                    }]
                }
            });

            const ctxExchange = document.getElementById("contactExchangedChart").getContext("2d");
            new Chart(ctxExchange, {
                type: "line",
                data: {
                    labels: dates,
                    datasets: [{
                        label: "Contact Exchanged",
                        data: contactExchanged,
                        borderColor: "rgb(193, 18, 31)",
                        backgroundColor: "rgb(255, 204, 213)",
                        fill: true
                    }]
                }
            })

            const ctxLink = document.getElementById("linkTapsChart").getContext("2d");
            new Chart(ctxLink, {
                type: "line",
                data: {
                    labels: dates,
                    datasets: [{
                        label: "Link Taps",
                        data: linkTaps,
                        borderColor: '#ff7b00',
                        backgroundColor: '#ffd991',
                        fill: true
                    }]
                }
            })
        });
    </script-->
    

@endsection
