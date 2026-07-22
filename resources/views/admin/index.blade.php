@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="">
        <div class="container mt-3">
            <div>
                <div class="row">
                    <div class="col-lg-8">
                       <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Total Sales')}}</h5>
                                <p class="card-text">{{ __('Total Sales for the current month')}}</p>
                                  <canvas class="my-4" id="salses_chart" width="900" height="380"></canvas>
                       </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Order Count')}}</h5>
                            <p class="card-text">{{ __('Number of orders for the current month')}}</p>
                            <canvas class="my-4" id="salses_count_chart" width="900" height="380"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
                <script>
                    var ctx = document.getElementById("salses_chart");
                    var ctx2 = document.getElementById("salses_count_chart");

                    var SalesChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($data['month']),
                            datasets: [{
                                label: 'Total Sales',
                                data: @json($data['total_amount']),
                               
                                backgroundColor: '#007bff2e',
                                borderColor: '#007bff',
                                borderWidth: 1,
                                pointBackgroundColor: '#007bff'
                            }, {
                                label: 'Order Count',
                                data: @json($data['order_count']),
                               
                                backgroundColor: 'transparent',
                                borderColor: '#28a745',
                                borderWidth: 1,
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

                    var SalesCountChart = new Chart(ctx2, {
                        type: 'line',
                        data: {
                            labels: @json($data['month']),
                            datasets: [{
                                label: 'Order Count',
                                data: @json($data['order_count']),
                                backgroundColor: '#00800031',
                                borderColor: 'green',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            legend: {
                                display: false,
                            }
                        }
                    });
                </script>
@endsection
