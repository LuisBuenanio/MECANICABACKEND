<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la maestria']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('titulo', 'Título:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título de la maestria']) !!} 

    @error('titulo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($maestria->foto)
                <img id="picture" src="{{asset('img/maestrias/'.$maestria->foto)}}" alt="">
            @else
                <img id="picture" src="https://media.istockphoto.com/photos/bumaestriasinessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?b=1&k=20&m=476085198&s=170667a&w=0&h=Ct4e1kIOdCOrEgvsQg4A1qeuQv944pPFORUQcaGw4oI=" alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('foto', 'Foto del maestria') !!}
            {!! Form::file('foto', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('foto')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Suba la foto de la maestria en este espacio</p>
    </div>
    
</div>


<div class="form-group">
    {!! Form::label('perfil_ingreso', 'Perfil de Ingreso:') !!}
    {!! Form::textarea('perfil_ingreso', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el perfil de ingreso de la maestria']) !!} 

    @error('perfil_ingreso')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('perfil_profesional', 'Perfil Profesional:') !!}
    {!! Form::textarea('perfil_profesional', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Perfil Profesional de la maestria']) !!} 

    @error('perfil_profesional')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('objetivo', 'Objetivo:') !!}
    {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el objetivo duracionde la maestria']) !!} 

    @error('objetivo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('duracion', 'Duración:') !!}
    {!! Form::text('duracion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la duracion de la  maestria']) !!} 

    @error('duracion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>



<div class="form-group">
    <div class="text-base text-gray-500 mt-4 text-justify">
        <p><strong>Malla Curricular Actual: </strong>
            <a href="{{ asset('docs/maestrias/'.$maestria->malla) }}" target="_blank">{{ $maestria->malla }} <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
        </p>
    </div>
    
    {!! Form::label('malla', 'Nueva Malla Curricular (opcional):') !!}
    {!! Form::file('malla', ['class' => 'form-control']) !!}

    @error('malla')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



<div class="form-group">
    {!! Form::label('modalidad', 'Modalidad:') !!}
    {!! Form::text('modalidad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la modalidad de la maestria']) !!} 

    @error('modalidad')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('formacion', 'Formación:') !!}
    {!! Form::text('formacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la formacion de la maestria']) !!} 

    @error('formacion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>



<div class="form-group">
    <p class="font-weight-bold">Publicación del maestria</p>
    
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


