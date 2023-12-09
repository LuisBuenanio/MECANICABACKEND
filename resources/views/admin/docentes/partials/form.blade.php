<div class="form-group">
    {!! Form::label('nombre', 'Nombre del Docente:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Docente']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono del Docente']) !!} 

    @error('telefono')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($docente->foto)
                <img id="picture" src="{{asset('img/docentes/'.$docente->foto)}}" alt="">
            @else
                <img id="picture" src="https://media.istockphoto.com/photos/budocentesinessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?b=1&k=20&m=476085198&s=170667a&w=0&h=Ct4e1kIOdCOrEgvsQg4A1qeuQv944pPFORUQcaGw4oI=" alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('foto', 'Foto del Docente') !!}
            {!! Form::file('foto', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('foto')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Suba la foto del Docente en este espacio</p>
    </div>
    
</div>



<div class="form-group">
    {!! Form::label('email', 'Correo Electrónico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del Docente']) !!} 

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('titulo', 'Título:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del Docente']) !!} 

    @error('titulo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('descripcion', 'Resumen Laboral:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un resumen Laboral del Docente']) !!} 

    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('hoja_vida', 'Hoja Vida:') !!}
    {!! Form::file('hoja_vida', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la hoja vida del Docente']) !!} 

    @error('hoja_vida')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('asignatura', 'Asignaturas que Imparte:') !!}
    {!! Form::text('asignatura', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las asignaturas que imparte el Docente']) !!} 

    @error('asignatura')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>



<div class="form-group">
    <p class="font-weight-bold">Publicación del Docente</p>
    
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


