@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Cronograma') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
            @endif

                <div class="card">
                    <div class="card-body" style="display: flex;justify-content: center">
                        <div class="chart-container" style="position: relative;width: 500px;height: 500px">
                            <canvas id="myChart" width="100" height="100"></canvas>
                        </div>
                    </div>
                </div>

                <livewire:risk-table-component/>


        </div>
    </div>


@endsection

@section('scripts')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! $labels !!},
                datasets: [{
                    label: '# of Votes',
                    data: {!! $data !!},
                    backgroundColor: {!! $chart_colors !!},
                    borderColor: {!! $chart_colors !!},
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        ticks:{
                            display:false
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        ticks:{
                            display:false
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Cronograma Impactado'
                    }
                }
            }
        });
    </script>
@endsection
