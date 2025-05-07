<div class="form-group">
    {!! Form::label('descripcion', 'Ingrese una descripción del Tipo de Titulación:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion']) !!} 

    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
{{-- <div class="form-group">

    <div class="text-base text-gray-500 mt-4 text-justify">
        <p><strong>Documento: </strong>
            <a href="{{ asset('docs/titulacion/tipos/'.$tipotitulacion->documento) }}" target="_blank">{{ $tipotitulacion->documento }}<i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
        </p>
    </div>
    
    @error('documento')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div> --}}


<div class="form-group">
    <div class="text-base text-gray-500 mt-4 text-justify">
        <p><strong>Documento Actual: </strong>
            <a href="{{ asset('docs/titulacion/tipos/'.$tipotitulacion->documento) }}" target="_blank">{{ $tipotitulacion->documento }} <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
        </p>
    </div>
    
    {!! Form::label('documento', 'Nuevo Documento (opcional):') !!}
    {!! Form::file('documento', ['class' => 'form-control']) !!}

    @error('documento')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



    

