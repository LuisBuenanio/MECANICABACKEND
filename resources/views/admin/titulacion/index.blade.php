@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    
    <h1>Datos Titulación</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        
        @if ($titulaciones->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Resumen</th>
                            <th>Portada</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($titulaciones as $titulacion)
                                <tr>
                                    <td>{{$titulacion->id}}</td>
                                    <td>{{$titulacion->descripciont}}</td>
                                    <td>{!!$titulacion->resumen!!}</td>
                                    <td>
                                        <img src="{{ asset('img/titulacion/' . $titulacion->portada) }}" alt=""
                                            style="max-width: 100px;">
                                    </td>   
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.titulacion.edit', $titulacion)}}">Editar</a>
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