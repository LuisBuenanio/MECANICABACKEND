
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Usuario']) !!} 

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del Usuario']) !!} 

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese una contraseña']) !!} 

    @error('password')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('confirm-password', 'Confirmar Contraseña:') !!}
    {!! Form::password('confirm-password', ['class' => 'form-control', 'placeholder' => 'Vuelva a ingresar su contraseña']) !!} 

    @error('password')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('roles_id', 'Seleccione el Rol del Usuario :') !!}
    {!! Form::select('roles[]', $roles,[], array ('class' => 'form-control')) !!} 

    @error('roles_id')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
