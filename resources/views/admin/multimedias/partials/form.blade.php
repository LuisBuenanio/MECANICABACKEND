<div class="form-group">
    {!! Form::label('galeria_id', 'Seleccione el nombre de la galería:') !!}
    {!! Form::select('galeria_id', $galeria, null, ['class' => 'form-control']) !!} 

    @error('galeria_id')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('nombre', 'Nombre de la Imagen:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Imagen']) !!} 
    
    @error('nombre')
       <small class="text-danger">{{$message}}</small>
    @enderror
</div>


<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($multimedia->url)
                <img id="picture" src="{{asset('img/galerias/imagenes/'.$multimedia->url)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg " alt="">
            @endisset
                 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('url', 'Imagen de portada de la galería') !!}
            {!! Form::file('url', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('url')
            <small class="text-danger">{{$message}}</small>
        @enderror
            <p>Suba una imagen para la galería</p>
    </div>                    
</div>