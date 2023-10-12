@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <h1>Datos de Escuela</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        
        @if ($escuelas->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Misión</th>
                            <th>Visión</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($escuelas as $escuela)
                                <tr>
                                    <td>{{$escuela->id}}</td>
                                    <td>{{$escuela->nombre}}</td>
                                    <td>{!!$escuela->mision!!}</td>
                                    <td>{!!$escuela->vision!!}</td>
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.escuela.edit', $escuela)}}">Editar</a>
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