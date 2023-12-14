@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <h1>Editar Noticias</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($noticia, [
                'route' => ['admin.noticias.update', $noticia->id],
                'autocomplete' => 'off',
                'files' => true,
                'method' => 'put',
            ]) !!}

            <div class="form-group">
                {!! Form::label('titulo', 'Título:') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título de la noticia']) !!}

                @error('titulo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror


            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug:') !!}
                {!! Form::text('slug', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el slug de la noticia',
                    'readonly',
                ]) !!}

                @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                {!! Form::label('fecha_publicacion', 'Fecha de Publicación:') !!}
                {!! Form::date('fecha_publicacion', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la fecha de la Receta',
                ]) !!}


                @error('fecha_publicacion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            
            <div class="form-group">
                <p class="font-weight-bold">Estado de Noticia</p>

                <label class="mr-2">
                    {!! Form::radio('estado', 1, true) !!}
                    No Publicada
                </label>
                <label class="mr-2">
                    {!! Form::radio('estado', 2) !!}
                    Publicada
                </label>

                <hr>
                @error('activo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper">
                        @isset($noticia->portada)
                            <img id="picture" src="{{ asset('img/noticias/portadas/' . $noticia->portada) }}" alt="">
                        @else
                            <img id="picture"
                                src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg "
                                alt="">
                        @endisset

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        {!! Form::label('portada', 'Portada de la Noticia') !!}
                        {!! Form::file('portada', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                    </div>

                    @error('portada')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <p>Suba la foto de Portada en este espacio</p>
                </div>

            </div>

            <div class="form-group">
                {!! Form::label('entradilla', 'Entradilla:') !!}
                {!! Form::textarea('entradilla', null, ['class' => 'form-control']) !!}

                @error('entradilla')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('contenido', 'Contenido de Noticia:') !!}
                {!! Form::textarea('contenido', null, ['class' => 'form-control']) !!}

                @error('contenido')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>





            <div class="form-group">
                <label for="imagenes">Imágenes adicionales:</label>
                @foreach ($noticia->images as $imagen)
                    <div class="mb-2">
                        <label for="imagen{{ $imagen->id }}">Imagen:</label>
                        {{-- <input type="file" name="imagenes[]"> --}}
                        <img src="{{ asset('img/noticias/imagenes/' . $imagen->image_path) }}" alt="Imagen actual"
                            class="img-fluid" style="width: 200px; height: auto;" >
                        <input type="hidden" name="imagen_ids[]" value="{{ $imagen->id }}">
                        <input type="checkbox" name="eliminar_imagenes[]" value="{{ $imagen->id }}"> Eliminar
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="imagenes">Subir más Imágenes adicionales:</label>
                {!! Form::file('nuevas_images[]', ['class' => 'form-control', 'multiple']) !!}
            </div>

            {!! Form::submit('Actualizar Noticia', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>

    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop


@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $("#titulo").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create(document.querySelector('#entradilla'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#contenido'))
            .catch(error => {
                console.error(error);
            });
        //Cambiar Imagen
        document.getElementById("portada").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var portada = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(portada);
        }
    </script>
@stop
