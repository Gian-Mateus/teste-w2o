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
            type: 'bar', // Tipo de gráfico (barra)
            data: {
                labels: @json($labels), // Labels (nomes dos itens)
                datasets: [{
                    label: 'Quantidade Vendida',
                    data: @json($data), // Dados (quantidades vendidas)
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Cor de fundo das barras
                    borderColor: 'rgba(54, 162, 235, 1)', // Cor da borda das barras
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Inicia o eixo Y do gráfico em zero
                    }
                }
            }
        });
</script>
    
@endsection
