@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    
    <h1>Datos Asociación</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        
        @if ($asociaciones->count())
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
                            @foreach ($asociaciones as $asociacion)
                                <tr>
                                    <td>{{$asociacion->id}}</td>
                                    <td>{{$asociacion->nombre}}</td>
                                    <td>{!!$asociacion->mision!!}</td>
                                    <td>{!!$asociacion->vision!!}</td>
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.asociacion.edit', $asociacion)}}">Editar</a>
                                    </td with="10px">                                    
                                </tr>
                            @endforeach
                        </tbody>
    
                    </thead>
    
                </table>
    
            </div>
            {{-- <div class="card-footer">
                {{$tipo_integrante->links()}}
            </div> --}}
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