<div class="form-group">
    {!! Form::label('nombre', 'Título:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la galería']) !!} 
    
    @error('nombre')
       <small class="text-danger">{{$message}}</small>
    @enderror


</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null,['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la galeria', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null,['class' => 'form-control', 'placeholder' => 'Ingrese una descripción para la galeria']) !!}

    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_creacion', 'Fecha de Publicación:') !!}
    {!! Form::date('fecha_creacion', null,['class' => 'form-control']) !!}

    @error('fecha_creacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
                <!-- 2630460803 -->
<div class="form-group">
    <p class="font-weight-bold">Estado de Noticia</p>
                    
    <label class="mr-2">
        {!! Form::radio('estado', 1, true ) !!}
            No Publicada
    </label>
    <label class="mr-2">
        {!! Form::radio('estado', 2 ) !!}
            Publicada
    </label>                     
    <hr>
    @error('activo')
        <small class="text-danger">{{$message}}</small>
    @enderror
                    
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($galeria->portada)
                <img id="picture" src="{{asset('img/galeria_port/'.$galeria->portada)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg " alt="">
            @endisset
                 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('portada', 'Imagen de portada de la galería') !!}
            {!! Form::file('portada', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('portada')
            <small class="text-danger">{{$message}}</small>
        @enderror
            <p>Suba una imagen de la noticia en este espacio</p>
    </div>
                    
</div>