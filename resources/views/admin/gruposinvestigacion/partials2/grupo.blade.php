
<div class="form-group">
    <p class="font-weight-bold">Estado de Publicación del grupo de Investigación</p>

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

<div class="form-group">
    {!! Form::label('codigo', 'Código:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código del grupo de investigacion']) !!}

    @error('codigo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('siglas', 'Siglas:') !!}
    {!! Form::text('siglas', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las siglas del grupo de investigacion']) !!}

    @error('siglas')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('nombre_gr', 'Nombre:') !!}
    {!! Form::text('nombre_gr', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre del grupo de investigacion']) !!}

    @error('nombre_gr')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($grupoInvestigacion->portada)
                <img id="picture" src="{{asset('img/grupos-investigacion/'.$grupoInvestigacion->portada)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg "
                alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('portada', 'Portada del  grupo de investigación') !!}
            {!! Form::file('portada', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('portada')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Suba la foto de Portada en este espacio</p>
    </div>
    
</div>




<div class="form-group">
    {!! Form::label('mision', 'Misión:') !!}
    {!! Form::textarea('mision', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la misión del grupo de investigacion']) !!}

    @error('mision')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('vision', 'Misión:') !!}
    {!! Form::textarea('vision', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la visión del grupo de investigacion']) !!}

    @error('vision')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('objetivo', 'Objetivo:') !!}
    {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el objetivo del grupo de investigacion']) !!}

    @error('objetivo')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>





<div class="card">
    <div class="card-body">
        <h1 class="text-center">Galería</h1>
        <div class="form-group">
            <label for="imagenes">Imágenes adicionales:</label>
            @foreach ($grupoInvestigacion->galeria_imagenes as $imagen)
                <div class="mb-2">
                    <label for="imagen{{ $imagen->id }}">Imagen: </label>
                    {{-- <input type="file" name="imagenes[]"> --}}
                    <img src="{{ asset('img/grupos-investigacion/galeria/' . $imagen->imagen_path) }}" alt="Imagen actual"
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
    </div>

</div>



