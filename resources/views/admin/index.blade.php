@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="">
        <div class="container mt-3">
            <div>
                <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
                <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($data['month']),
                            datasets: [{
                                label: 'Total Sales',
                                data: @json($data['total_amount']),
                                lineTension: 0,
                                backgroundColor: 'transparent',
                                borderColor: '#007bff',
                                borderWidth: 4,
                                pointBackgroundColor: '#007bff'
                            }, {
                                label: 'Order Count',
                                data: @json($data['order_count']),
                                lineTension: 0,
                                backgroundColor: 'transparent',
                                borderColor: '#28a745',
                                borderWidth: 4,
                                pointBackgroundColor: '#28a745'
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: false
                                    }
                                }]
                            },
                            legend: {
                                display: false,
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
