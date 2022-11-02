<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del integrante']) !!} 

    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono del integrante']) !!} 

    @error('telefono')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('email', 'email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del integrante']) !!} 

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('asociacion_id', 'Asociación:') !!}
    {!! Form::select('asociacion_id', $asociacion, null, ['class' => 'form-control']) !!} 

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('tipo_integrante_id', 'Tipo Integrante:') !!}
    {!! Form::select('tipo_integrante_id', $tipo_integrante, null, ['class' => 'form-control']) !!} 

    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<br>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($integrante->foto)
                <img id="picture" src="{{asset('img/asociacion/integrantes/'.$integrante->foto)}}" alt="">
            @else
                <img id="picture" src="https://media.istockphoto.com/photos/businessman-silhouette-as-avatar-or-default-profile-picture-picture-id476085198?b=1&k=20&m=476085198&s=170667a&w=0&h=Ct4e1kIOdCOrEgvsQg4A1qeuQv944pPFORUQcaGw4oI=" alt="">
            @endisset
 
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('foto', 'Foto del Integrante') !!}
            {!! Form::file('foto', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('foto')
            <small class="text-danger">{{$message}}</small>
        @enderror

        <p>Suba la foto del Integrante en este espacio</p>
    </div>
    
</div>