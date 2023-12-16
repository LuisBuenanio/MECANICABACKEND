<div class="card">
    <div class="card-body">
        <h2 class="text-center">Investigadores</h2>
       {{--  <!-- Campos para los integrantes -->
        <div class="form-group">
            {{ Form::label('investigadores[][nombre]', 'Nombre del Investigador') }}
            {{ Form::text('investigadores[][nombre]', null, ['class' => 'form-control']) }}

        </div>
        <div class="form-group">
            {{ Form::label('investigadores[][email]', 'Email del Investigador') }}
            {{ Form::text('investigadores[][email]', null, ['class' => 'form-control']) }}

        </div>


        <!-- Campo para el tipo de investigador -->
        <div class="form-group">
            {{ Form::label('tipo_investigador_id', 'Tipo de Investigador') }}
            {{ Form::select('tipo_investigador_id', $tiposInvestigadores->pluck('descripcion', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de investigador']) }}
        </div>
    </div> --}}

    <!-- Sección para seleccionar investigadores existentes -->
<div class="form-group">
    <label for="investigadores">Seleccionar Investigadores Existentes:</label>
    <select name="investigadores[]" multiple>
        @foreach($investigadores as $investigador)
            <option value="{{ $investigador->id }}">{{ $investigador->nombre }} - {{ $investigador->email }}</option>
        @endforeach
    </select>
</div>

<!-- Sección para agregar nuevos investigadores -->
<div class="form-group">
    <label for="nuevo_investigador">Agregar Nuevo Investigador:</label>
    <input type="text" name="nuevo_investigador" placeholder="Nombre del Nuevo Investigador">
    <!-- Agrega otros campos según sea necesario -->
</div>

</div>
