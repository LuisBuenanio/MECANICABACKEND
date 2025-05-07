<div class="form-group">
    {!! Form::label('titulo', 'Título del evento:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del evento']) !!} 

    @error('titulo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción del Evento:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una descripción del evento']) !!} 

    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha y Hora de Inicio:') !!}
    {!! Form::datetimeLocal('fecha_inicio', \Carbon\Carbon::now()->format('Y-m-d\TH:i'), [
        'class' => 'form-control',
        'placeholder' => 'Ingrese la fecha de Inicio del Evento',
    ]) !!}
    @error('fecha_inicio')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha y Hora de Finalización:') !!}
    {!! Form::datetimeLocal('fecha_fin', \Carbon\Carbon::now()->format('Y-m-d\TH:i'), [
        'class' => 'form-control',
        'placeholder' => 'Ingrese la fecha de Finalización del Evento',
    ]) !!}
    @error('fecha_fin')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">
    <p class="font-weight-bold">Publicación del Evento</p>
    
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
