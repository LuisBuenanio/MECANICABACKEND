@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <h1>Crear nuevo nuevo Tipo Integrante</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tipointegrantes.store', 'autocomplete' => 'off', 'files' => true])!!}

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción:') !!}
                {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion del tipo de integrante']) !!} 

                @error('descripcion')
                    <small class="text-danger">{{$message}}</small>
                @enderror

            </div>

                {!! Form:: submit('Crear Tipo Integrante',['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>

    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop