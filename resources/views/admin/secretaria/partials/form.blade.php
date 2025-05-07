<div class="form-group">
    {!! Form::label('nombre_secretaria', 'Nombre de la secretaria:') !!}
    {!! Form::text('nombre_secretaria', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre de la Secretaria']) !!} 

    @error('nombre_secretaria')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('telefono_secretaria', 'Teléfono de la secretaria:') !!}
    {!! Form::text('telefono_secretaria', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre de la Secretaria']) !!} 

    @error('telefono_secretaria')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('email_secretaria', 'Email de la secretaria:') !!}
    {!! Form::email('email_secretaria', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre de la Secretaria']) !!} 

    @error('email_secretaria')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($secretaria->foto_secretaria)
                <img id="picture" src="{{asset('img/secretaria/'.$secretaria->foto_secretaria)}}" alt="">
            @else
                <img id="picture" src="https://media.istockphoto.com/photos/budocentesinessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?b=1&k=20&m=476085198&s=170667a&w=0&h=Ct4e1kIOdCOrEgvsQg4A1qeuQv944pPFORUQcaGw4oI=" alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('foto_secretaria', 'Foto de la Secretaria') !!}
            {!! Form::file('foto_secretaria', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('foto')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Suba la foto de la secretaria en este espacio</p>
    </div>
    
</div>


<div class="form-group">
    {!! Form::label('nombre_documento', 'Nombre del Documento:') !!}
    {!! Form::text('nombre_documento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre de la Secretaria']) !!} 

    @error('nombre_documento')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('detalle_documento', 'Detalle del Documento:') !!}
    {!! Form::text('detalle_documento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre de la Secretaria']) !!} 

    @error('detalle_documento')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    <div class="text-base text-gray-500 mt-4 text-justify">
        <p><strong>Documento Actual: </strong>
            <a href="{{ asset('docs/secretaria/'.$secretaria->documento) }}" target="_blank">{{ $secretaria->documento }} <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
        </p>
    </div>
    
    {!! Form::label('documento', 'Nuevo Documento (opcional):') !!}
    {!! Form::file('documento', ['class' => 'form-control']) !!}

    @error('documento')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



    

