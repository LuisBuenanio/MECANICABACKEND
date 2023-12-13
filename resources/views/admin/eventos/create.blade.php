@extends('adminlte::page')

@section('title', 'eventos')

@section('content_header')
    <h1>Crear Nuevo evento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.eventos.store', 'autocomplete' => 'off', 'files' => true])!!}

            <div class="form-group">
                {!! Form::label('titulo', 'Título del evento:') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del evento']) !!} 
            
                @error('titulo')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
            
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción del Evento:') !!}
                {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una descripción del evento']) !!} 
            
                @error('descripcion')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
            
            <div class="form-group">
                {!! Form::label('fecha_inicio', 'Fecha y Hora de Inicio:') !!}
                {!! Form::datetimeLocal('fecha_inicio', \Carbon\Carbon::now(), [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la fecha de Inicio del Evento',
                ]) !!}
                @error('fecha_inicio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            <div class="form-group">
                {!! Form::label('fecha_fin', 'Fecha y Hora de Finalización:') !!}
                {!! Form::datetimeLocal('fecha_fin', \Carbon\Carbon::now(), [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la fecha de Finalización del Evento',
                ]) !!}
                @error('fecha_fin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            <div class="form-group">
                <p class="font-weight-bold">Publicación del Evento</p>
                
                <label class="mr-2">
                    {!! Form::radio('estado', 1, true ) !!}
                    Borrador
                </label>
                <label class="mr-2">
                    {!! Form::radio('estado', 2 ) !!}
                    Publicado
                </label>      
                
                <hr>
                @error('estado')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                
            </div>

                {!! Form:: submit('Crear evento',['class' => 'btn btn-primary']) !!}

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
            .create( document.querySelector( '#d' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#objetivo' ) )
            .catch( error => {
                console.error( error );
            } );
        //Cambiar Imagen
        document.getElementById( "foto").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var foto = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(foto);
        }

    </script>
@stop