<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Autoridad']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono de la Autoridad']) !!} 

    @error('telefono')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('hoja_vida', 'Hoja de Vida:') !!}
    {!! Form::file('hoja_vida', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la hoja de vida de la autoridad']) !!} 

    @error('hoja_vida')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('tipo_autoridad_id', 'Tipo Integrante:') !!}
    {!! Form::select('tipo_autoridad_id', $tipo_autoridad, null, ['class' => 'form-control']) !!} 

    @error('tipo_autoridad_id')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<br>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($autoridad->foto)
                <img id="picture" src="{{asset('img/autoridades/'.$autoridad->foto)}}" alt="">
            @else
                <img id="picture" src="https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?b=1&k=20&m=476085198&s=170667a&w=0&h=Ct4e1kIOdCOrEgvsQg4A1qeuQv944pPFORUQcaGw4oI=" alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('foto', 'Foto de la Autoridad') !!}
            {!! Form::file('foto', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('foto')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Suba la foto de la Autoridad en este espacio</p>
    </div>
    
</div>