<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion del tipo de integrante']) !!} 

    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('mision', 'Misión de la Asociación:') !!}
    {!! Form::textarea('mision', null,['class' => 'form-control']) !!}

    @error('mision')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('vision', 'Visión de la Asociación:') !!}
    {!! Form::textarea('vision', null,['class' => 'form-control']) !!}

    @error('mision')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null,['class' => 'form-control']) !!}

    @error('telefono')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($asociacion->logo)
                <img id="picture" src="{{asset('img/asociacion/'.$asociacion->logo)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg " alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('logo', 'Logo de la Asociación') !!}
            {!! Form::file('logo', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('logo')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Seleccione una imagen de portada de la Asociación.</p>
    </div>
    
</div>
<div class="form-group">
    {!! Form::label('fecha_creacion', 'Fecha de Posesión de la Asociación:') !!}
    {!! Form::date('fecha_creacion', null,['class' => 'form-control']) !!}

    @error('fecha_creacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('facebook', 'Facebook de la Asociación: (enlace)') !!}
    {!! Form::text('facebook', null,['class' => 'form-control']) !!}

    @error('facebook')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>