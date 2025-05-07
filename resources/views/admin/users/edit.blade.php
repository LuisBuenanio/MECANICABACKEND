@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>

            <h2 class="h5">Listado de roles</h2>
            {!! Form::model($user,['route' => ['admin.users.update',$user], 'autocomplete' => 'off', 'files' => true, 'method' => 'put'])!!}

                
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
                    {!! Form::select('roles[]', $roles,$userRole, array ('class' => 'form-control')) !!} 

                    @error('roles_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>


                {!! Form:: submit('Actualizar Médico',['class' => 'btn btn-primary mt-2']) !!}


            {!! Form::close() !!}

        </div>

    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop


@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#titulo").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
        
        ClassicEditor
            .create( document.querySelector( '#entradilla' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#contenido' ) )
            .catch( error => {
                console.error( error );
            } );
        //Cambiar Imagen
        document.getElementById( "file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

    </script>
@stop