@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    
    <h1>Datos de Tipos de Titulación</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        
        @if ($tipotitulaciones->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Documento</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($tipotitulaciones as $tipotitulacion)
                                <tr>
                                    <td>{{$tipotitulacion->id}}</td>
                                    <td>{{$tipotitulacion->descripcion}}</td>
                                    <td>{!!$tipotitulacion->documento!!}</td>
                                     
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.tipotitulacion.edit', $tipotitulacion)}}">Editar</a>
                                    </td with="10px">                                    
                                </tr>
                            @endforeach
                        </tbody>
    
                    </thead>
    
                </table>
    
            </div>
        @else
            <div class="card-body">
                <strong>No existen registros ......</strong>
            </div>
        @endif
    
    </div>
    
    
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop