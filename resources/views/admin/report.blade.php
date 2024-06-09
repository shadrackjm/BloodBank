@extends('layouts/admin-layout')

@section('main-section')
     <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="lineChart1" style="max-height: 400px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="lineChart2" style="max-height: 400px;"></canvas>
                        </div>
                       
                    </div>
                    <div class="row">
                             <div class="col-md-6">
                            <canvas id="lineChart3" style="max-height: 400px;"></canvas>
                        </div>
                    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetch('/admin/users-by-month')
                .then(response => response.json())
                .then(data => {
                    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    const seriesData = new Array(12).fill(0);

                    data.forEach(item => {
                        seriesData[item.month - 1] = item.count;
                    });

                    new Chart(document.querySelector('#lineChart1'), {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Users',
                                data: seriesData,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.3
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: false
                                }
                            }
                        }
                    });
                });
        });

        // 
        document.addEventListener("DOMContentLoaded", () => {
            fetch('/admin/donors-by-month')
                .then(response => response.json())
                .then(data => {
                    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    const seriesData = new Array(12).fill(0);

                    data.forEach(item => {
                        seriesData[item.month - 1] = item.count;
                    });

                    new Chart(document.querySelector('#lineChart2'), {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Donors',
                                data: seriesData,
                                fill: false,
                                borderColor: 'rgb(255, 99, 132)',
                                tension: 0.3
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: false
                                }
                            }
                        }
                    });
                });
        });

        document.addEventListener("DOMContentLoaded", () => {
            fetch('/admin/requests-by-month')
                .then(response => response.json())
                .then(data => {
                    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    const seriesData = new Array(12).fill(0);

                    data.forEach(item => {
                        seriesData[item.month - 1] = item.count;
                    });

                    new Chart(document.querySelector('#lineChart3'), {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Blood Requests',
                                data: seriesData,
                                fill: false,
                                borderColor: 'rgb(255, 99, 132)',
                                tension: 0.3
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: false
                                }
                            }
                        }
                    });
                });
        });
    </script>

                
                </div>
@endsection