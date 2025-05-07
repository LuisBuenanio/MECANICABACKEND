<!-- resources/views/grupos/partials/programas.blade.php -->

@foreach ($programasInvestigacion as $programa)
    <label>
        {!! Form::checkbox('programas_investigacion[]', $programa->id) !!}
        {{ $programa->descripcion }}
    </label><br>
@endforeach
