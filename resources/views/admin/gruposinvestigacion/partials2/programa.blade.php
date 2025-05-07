<div class="list-group">
    <h1 class="text-center">Líneas y programas de Investigación</h1>
    @forelse ($lineasInvestigacion as $linea)
        <div class="list-group-item list-group-item-action">
            <label>
                {!! Form::checkbox('lineas_investigacion[]', $linea->id, in_array($linea->id, $grupoInvestigacion->lineasInvestigacion->pluck('id')->toArray()), ['class' => 'linea-checkbox']) !!}
                <strong>{{ $linea->descripcion }}</strong>
            </label>

            <ul class="list-group mt-2">
                @forelse ($programasInvestigacion->where('linea_investigacion_id', $linea->id) as $programa)
                    <li class="list-group-item">
                        {!! Form::checkbox('programas_investigacion[]', $programa->id, in_array($programa->id, $grupoInvestigacion->programasInvestigacion->pluck('id')->toArray()), ['class' => 'form-check-input programa-checkbox']) !!}
                        {{ $programa->descripcion }}
                    </li>
                @empty
                    <li class="list-group-item">No hay programas de investigación para esta línea.</li>
                @endforelse
            </ul>
        </div>
    @empty
        <p>No hay líneas de investigación disponibles.</p>
    @endforelse
</div>
