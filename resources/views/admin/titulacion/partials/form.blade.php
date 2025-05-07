<div class="form-group">
    {!! Form::label('descripciont', 'Ingrese una breve descripción sobre el proceso de Titulación:') !!}
    {!! Form::text('descripciont', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion para la pantalla de titulación']) !!} 

    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('resumen', 'Ingrese un resumen sobre el proceso de Titulación:') !!}
    {!! Form::textarea('resumen', null,['class' => 'form-control']) !!}

    @error('resumen')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($titulacion->portada)
                <img id="picture" src="{{asset('img/titulacion/'.$titulacion->portada)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg " alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('portada', 'Portada de la Titulación') !!}
            {!! Form::file('portada', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('portada')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Seleccione una imagen de portada de la Asociación.</p>
    </div>
    
</div>
