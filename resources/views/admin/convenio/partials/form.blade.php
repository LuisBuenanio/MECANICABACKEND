<div class="form-group">
    {!! Form::label('resolucion', 'Resolución:') !!}
    {!! Form::text('resolucion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la resolución del Convenio']) !!} 

    @error('resolucion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Convenio']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('objetivo', 'Objetivo:') !!}
    {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el objetivo del Convenio']) !!} 

    @error('objetivo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('tipo_convenio_id', 'Tipo Convenio:') !!}
    {!! Form::select('tipo_convenio_id', $tipo_convenio, null, ['class' => 'form-control']) !!} 

    @error('tipo_convenio_id')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('fecha_legalizacion', 'Fecha Legalización:') !!}
    {!! Form::date('fecha_legalizacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de legalización del Convenio']) !!} 

    @error('fecha_legalizacion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('coordinador', 'Coordinador:') !!}
    {!! Form::text('coordinador', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Coordinador del Convenio']) !!} 

    @error('coordinador')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    <p class="font-weight-bold">Estado del convenio</p>
    
    <label class="mr-2">
        {!! Form::radio('estado', 1, true ) !!}
        Inactivo
    </label>
    <label class="mr-2">
        {!! Form::radio('estado', 2 ) !!}
        Activo
    </label>      
    
    <hr>
    @error('activo')
        <small class="text-danger">{{$message}}</small>
    @enderror
    
</div>
<div class="form-group">
    {!! Form::label('vigencia', 'Años de Vigencia:') !!}
    {!! Form::text('vigencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Coordinador del Convenio']) !!} 

    @error('vigencia')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>