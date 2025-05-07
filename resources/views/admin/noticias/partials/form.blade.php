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
    {!! Form::date('fecha_publicacion', \Carbon\Carbon::now(), [
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
        Borrador
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
                <img id="picture" src="{{asset('img/noticias/portadas/'.$noticia->portada)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg "
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
            <small class="text-danger">{{$message}}</small>
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
    {!! Form::file('images[]', ['class' => 'form-control', 'multiple']) !!}
</div>