@extends('layout.template')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main class="container">

    <!-- Canvas onde o gráfico será renderizado -->
    <canvas id="topItemsChart" width="400" height="200"></canvas>
    
</main>
    <script>
        var ctx = document.getElementById('topItemsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Quantidade Vendida',
                    data: @json($data),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)', 
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>
    
@endsection
