<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la carrera']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('mision', 'Misión de la Carrera:') !!}
    {!! Form::textarea('mision', null,['class' => 'form-control']) !!}

    @error('mision')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('vision', 'Visión de la Carrera:') !!}
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
<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico:') !!}
    {!! Form::email('email', null,['class' => 'form-control']) !!}

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('direccion', 'Dirección:') !!}
    {!! Form::text('direccion', null,['class' => 'form-control']) !!}

    @error('direccion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

{{-- Subir un pdfp --}}
<div class="form-group">
    {!! Form::label('malla', 'Malla de la Carrera en formato pdf') !!}
    {!! Form::file('malla', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}
    @error('malla')
        <small class="text-danger">{{$message}}</small>
    @enderror    
</div>
<div class="form-group">
    {!! Form::label('duracion', 'Duración de Carrera:') !!}
    {!! Form::text('duracion', null,['class' => 'form-control']) !!}

    @error('duracion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('perfil', 'Perfil Ocupacional:') !!}
    {!! Form::textarea('perfil', null,['class' => 'form-control']) !!}

    @error('perfil')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('campo', 'Campo Ocupacional:') !!}
    {!! Form::textarea('campo', null,['class' => 'form-control']) !!}

    @error('campo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('titulo', 'Título Obtenido:') !!}
    {!! Form::text('titulo', null,['class' => 'form-control']) !!}

    @error('titulo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('modalidad', 'Modalidad de Estudios:') !!}
    {!! Form::text('modalidad', null,['class' => 'form-control']) !!}

    @error('modalidad')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_creacion', 'Fecha de Creación de la Carrera:') !!}
    {!! Form::date('fecha_creacion', null,['class' => 'form-control']) !!}

    @error('fecha_creacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($escuela->logo_escuela)
                <img id="picture" src="{{asset('img/escuela/'.$escuela->logo_escuela)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg " alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('logo_escuela', 'Logo de la Carrera') !!}
            {!! Form::file('logo_escuela', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('logo_escuela')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Seleccione una imagen de portada de la carrera.</p>
    </div>
    
</div>

<div class="form-group">
    {!! Form::label('mapa', 'Mapa de la Carrera:') !!}
    {!! Form::textarea('mapa', null,['class' => 'form-control']) !!}

    @error('mapa')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>



   

                