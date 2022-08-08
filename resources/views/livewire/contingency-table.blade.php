<div class="card">
    <div class="card-header">
        @if(session('success'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif
        <button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#contingencyModal">Crear Plan de Contingencia</button>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Nombre del Riesgo</th>
                <th>Decisión</th>
                <th>Plan de Contingencia</th>
            </tr>
            </thead>
            <tbody>
            <div>
                @foreach($risks as $risk)
                    <tr>
                        <td>{{ $risk->name }}</td>
                        <td><div><span class="badge badge-{{ App\Models\Risk::ACTION[$risk['action'] - 1]['color'] }} text-sm">{{ App\Models\Risk::ACTION[$risk['action'] - 1]['name'] }}</span></div></td>
                        <td>
                           <span>{{ App\Models\Contingency::CONTINGENCIES[$risk->action - 1]['description'] }}</span>
                        </td>
                    </tr>
                @endforeach
            </div>
            </tbody>
        </table>
    </div>





</div>
