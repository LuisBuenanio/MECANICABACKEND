<div class="form-group">
    {!! Form::label('codigo', 'Código del Proyecto:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código del proyecto']) !!} 

    @error('codigo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Proyecto']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('objetivo', 'Objetivo:') !!}
    {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el objetivo del Proyecto']) !!} 

    @error('objetivo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('tipo_proyecto_id', 'Tipo Proyecto:') !!}
    {!! Form::select('tipo_proyecto_id', $tipo_proyecto, null, ['class' => 'form-control']) !!} 

    @error('tipo_proyecto_id')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('coordinador', 'Coordinador:') !!}
    {!! Form::text('coordinador', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Coordinador del Proyecto']) !!} 

    @error('coordinador')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    <p class="font-weight-bold">Estado del Proyecto</p>
    
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