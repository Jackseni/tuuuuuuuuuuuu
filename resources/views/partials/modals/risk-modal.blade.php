<!-- Modal -->
<div class="modal fade" id="riskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{  route('risk.store') }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Riesgo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Nombre del Riesgo</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">Proceso al que está asociado</label>
                            <select class="form-control" name="process_id">
                                @foreach($processes as $process)
                                    <option value="{{ $process->id }}">{{ $process->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">¿Cada cuánto podría suceder?</label>
                            <select class="form-control" name="frecuency">
                                @foreach(App\Models\Risk::FREQUENCY as $frequency)
                                    <option value="{{ $frequency['id'] }}">{{ $frequency['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">¿Qué impacto podría causar?</label>
                            <select class="form-control" name="impact">
                                @foreach(App\Models\Risk::IMPACT as $impact)
                                    <option value="{{ $impact['id'] }}">{{ $impact['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>
