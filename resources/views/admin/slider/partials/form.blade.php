<div class="form-group">
    {!! Form::label('name', 'Nombre de la Imagen:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Descripcion de la Imagen']) !!} 
    
    @error('name')
       <small class="text-danger">{{$message}}</small>
    @enderror


</div>

            
<div class="form-group">
    <p class="font-weight-bold">Estado de Imagen</p>
                    
    <label class="mr-2">
        {!! Form::radio('estado', 1, true ) !!}
            No Publicado
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

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($slider->s_imagen)
                <img id="picture" src="{{asset('img/slider/'.$slider->s_imagen)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg " alt="">
            @endisset
                 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('s_imagen', 'Imagen') !!}
            {!! Form::file('s_imagen', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('s_imagen')
            <small class="text-danger">{{$message}}</small>
        @enderror
            <p>Suba una imagen en este espacio</p>
    </div>
                    
</div>