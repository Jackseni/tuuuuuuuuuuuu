@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           <div class="row">
                               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#processModal">
                                   Nuevo Proceso
                               </button>
                               <button type="button" class="btn btn-warning ml-2" data-bs-toggle="modal" data-bs-target="#riskModal">
                                   Nuevo Riesgo
                               </button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.modals.process-modal')
            @include('partials.modals.risk-modal')

            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="matrix-container ml-4">
                                        <div><strong>Insignificante</strong></div>
                                        <div><strong>Menor</strong></div>
                                        <div><strong>Menor</strong></div>
                                        <div><strong>Mayor</strong></div>
                                        <div><strong>Catastrofica</strong></div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                     <div class="matrix-container-alt">
                                         <div><strong>Raro</strong></div>
                                         <div><strong>Improbable</strong></div>
                                         <div><strong>Posible</strong></div>
                                         <div><strong>Probable</strong></div>
                                         <div><strong>Casi Seguro</strong></div>
                                     </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="matrix-container">
                                        @foreach($cards as $card)
                                            <div class="matrix-card bg-{{ $card->color }}">
                                                <div class="">
                                                    @foreach($card->risks as $risk)
                                                        <span class="badge badge-light">{{ $risk->name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Proceso</th>
                                    <th>Frecuencia</th>
                                    <th>Impacto</th>
                                    <th>Riesgo</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($risks as $risk)
                                        <tr>
                                            <td>{{ $risk['name'] }}</td>
                                            <td>{{ $risk['process']['name'] }}</td>
                                            <td><span class="badge badge-secondary text-sm">{{ $risk['frequency_label'] }}</span></td>
                                            <td><span class="badge badge-info text-sm">{{ $risk['impact_label'] }}</span></td>
                                            <td><span class="badge badge-{{ $risk['risk_color'] }} text-sm">{{ $risk['risk_label'] }}</span></td>
                                            <td>
                                                <form action="{{ route('risk.destroy',$risk['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn"><i class="fas fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
