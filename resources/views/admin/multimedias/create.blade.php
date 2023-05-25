@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <h1>Subir Imágenes a galerías</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.multimedias.store', 'autocomplete' => 'off', 'files' => true])!!}

        
        @include('admin.multimedias.partials.form')

        {!! Form:: submit('Subir Imagen',['class' => 'btn btn-primary']) !!}

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
        document.getElementById( "url").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var url = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(url);
        }

    </script>
@stop