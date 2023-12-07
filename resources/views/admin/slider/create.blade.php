@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <h1>Subir Nueva Imagen</h1>
@stop

@section('content')
    @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.slider.store', 'autocomplete' => 'off', 'files' => true])!!}

                @include('admin.slider.partials.form')

                {!! Form:: submit('Subir Imagen Slider',['class' => 'btn btn-primary']) !!}

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
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
        
        ClassicEditor
            .create( document.querySelector( '#descripcionz' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#contenido' ) )
            .catch( error => {
                console.error( error );
            } );
        //Cambiar Imagen
        document.getElementById( "s_imagen").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var s_imagen = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(s_imagen);
        }

    </script>
@stop