<div class="card">
    <div class="card-header">
        @if(session('success'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Nombre del Riesgo</th>
                <th>Información</th>
                <th>Dueño del Riesgo</th>
                <th>Costo Adicional</th>
                <th>Decisión</th>
                <th>Prevención</th>
            </tr>
            </thead>
            <tbody>
            <div>
                @foreach($risks as $risk)
                    <tr>
                        <td>{{ $risk['name'] }}</td>
                        <td>
                            <div><strong>Proceso: </strong>{{ $risk['process']['name'] }}</div>
                            <div><strong>Frecuencia: <span class="badge badge-success text-sm">{{ $risk['frequency_label'] }}</span></strong></div>
                            <div><strong>Impacto: </strong><span class="badge badge-info text-sm">{{ $risk['impact_label'] }}</span></div>
                            <div><strong>Riesgo: </strong><span class="badge badge-{{ $risk['risk_color'] }} text-sm">{{ $risk['risk_label'] }}</span></div>
                            <div><strong>Decisión: </strong><span class="badge badge-{{ App\Models\Risk::ACTION[$risk['action'] - 1]['color'] }} text-sm">{{ App\Models\Risk::ACTION[$risk['action'] - 1]['name'] }}</span></div>
                        </td>
                        <td>
                            <select name="owner" id="owner" class="form-control" wire:change="$emit('ownerSelected', $event.target.value,{{ $risk['id'] }})">
                                @foreach(App\Models\Risk::OWNERS as $owner)
                                    <option value="{{ $owner['id'] }}" {{ $risk['owner'] == $owner['id'] ? 'selected' : '' }}>{{ $owner['name'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="cost" id="cost" class="form-control" wire:change="$emit('costSelected', $event.target.value,{{ $risk['id'] }})">
                                @foreach(App\Models\Risk::COSTS as $cost)
                                    <option value="{{ $cost['id'] }}" {{ $risk['cost'] == $cost['id'] ? 'selected' : '' }}>{{ $cost['name'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="owner" id="owner" class="form-control" wire:change="$emit('actionSelected', $event.target.value,{{ $risk['id'] }})">
                                @foreach(App\Models\Risk::ACTION as $action)
                                    <option value="{{ $action['id'] }}" {{ $risk['action'] == $action['id'] ? 'selected' : '' }}>{{ $action['name'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="prevention" id="prevention" class="form-control" wire:change="$emit('preventionSelected', $event.target.value,{{ $risk['id'] }})">
                                @foreach(App\Models\Risk::PREVENTIONS as $prevention)
                                    <option value="{{ $prevention['id'] }}" {{ $risk['prevention'] == $prevention['id'] ? 'selected' : '' }}>{{ $prevention['name'] }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </div>
            </tbody>
        </table>
    </div>
</div>
