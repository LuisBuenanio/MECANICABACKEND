<div class="form-group">
    <label for="lineas_investigacion">Líneas de Investigación</label>
    <div id="lineas-container">
        {{-- Loop para mostrar checkboxes para las líneas de investigación --}}
        @foreach ($lineasInvestigacion as $linea)
            <div class="form-check">
                {!! Form::checkbox('lineas_investigacion[]', $linea->id, false, ['class' => 'form-check-input linea-checkbox']) !!}
                <label class="form-check-label" for="lineas_investigacion_{{ $linea->id }}">{{ $linea->descripcion }}</label>
            </div>
        @endforeach
    </div>
</div>

<div id="programas-container" style="display: none;">
    <div class="form-group">
        <label for="programas_investigacion">Programas de Investigación</label>
        <div id="checkbox-programas">
            {{-- Loop para mostrar checkboxes para los programas de investigación --}}
            @foreach ($programasInvestigacion as $programa)
                <div class="form-check">
                    {!! Form::checkbox('programas_investigacion[]', $programa->id, false, ['class' => 'form-check-input programa-checkbox']) !!}
                    <label class="form-check-label" for="programas_investigacion_{{ $programa->id }}">{{ $programa->descripcion }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>