
 <div class="list-group">
    <h1 class="text-center">Líneas y programas de Investigación</h1>
    @foreach ($lineasInvestigacion as $linea)
        <div class="list-group-item list-group-item-action">
            <label>
                {!! Form::checkbox('lineas_investigacion[]', $linea->id, false, ['class' => 'linea-checkbox']) !!}
                <strong>{{ $linea->descripcion }}</strong>
            </label>
            
            <ul class="list-group mt-2">
                @foreach ($programasInvestigacion as $programa)
                    @if ($programa->linea_investigacion_id == $linea->id)
                        <li class="list-group-item">
                            {!! Form::checkbox('programas_investigacion[]', $programa->id, false, ['class' => 'form-check-input programa-checkbox']) !!}
                            {{ $programa->descripcion }}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
