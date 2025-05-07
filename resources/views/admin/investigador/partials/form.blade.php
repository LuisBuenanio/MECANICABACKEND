
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del investigador']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del investigador']) !!} 

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('tipo_investigador_id', 'Tipo investigador:') !!}
    {!! Form::select('tipo_investigador_id', $tipo_investigador, null, ['class' => 'form-control']) !!} 

    @error('tipo_investigador_id')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


