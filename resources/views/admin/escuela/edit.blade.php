@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <h1>Editar Escuela</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            
            {!! Form::model($escuela,['route' => ['admin.escuela.update',$escuela], 'autocomplete' => 'off', 'files' => true, 'method' => 'put'])!!}

                @include('admin.escuela.partials.form')

                {!! Form:: submit('Actualizar Escuela',['class' => 'btn btn-primary']) !!}

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
            .create( document.querySelector( '#mision' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#vision' ) )
            .catch( error => {
                console.error( error );
            } );ClassicEditor
            .create( document.querySelector( '#perfil' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#campo' ) )
            .catch( error => {
                console.error( error );
            } );
        //Cambiar Imagen
        document.getElementById( "logo_escuela").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var logo_escuela = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(logo_escuela);
        }

    </script>
@stop