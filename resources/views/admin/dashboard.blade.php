@extends('admin.master')

@section('title', 'Sunodia ~ Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
@endsection

@section('content')
    <div class="mb-3 card">
        <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Dashboard
            </div>
        </div>
        <div class="card-body">
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="{{ asset('js/swal.js') }}"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: {!! $chart_1->map(function($c) {
                     return $c->tahun_pembelajaran;
                }) !!},
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',   
                    data: {!! $chart_1->map(function($c) {
                     return $c->count_siswa;
                }) !!}
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                },
            }
        });
    </script>
@endsection