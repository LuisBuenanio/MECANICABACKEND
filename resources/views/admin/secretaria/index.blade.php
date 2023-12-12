@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    
    <h1>Datos de Secretaría</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        
        @if ($secretarias->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Secretaria</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Foto</th>             
                            <th>Documento</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($secretarias as $secretaria)
                                <tr>
                                    <td>{{$secretaria->id}}</td>
                                    <td>{{$secretaria->nombre_secretaria}}</td>
                                    <td>{!!$secretaria->telefono_secretaria!!}</td>
                                    <td>{{$secretaria->email_secretaria}}</td>
                                    <td>
                                        <img src="{{ asset('img/secretaria/' . $secretaria->foto_secretaria) }}" alt="{{ $secretaria->nombre_secreatria }}"
                                            style="max-width: 100px;">
                                    </td> 
                                    <td>{!!$secretaria->documento!!}</td>
                                     
                                     
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.secretaria.edit', $secretaria->id)}}">Editar</a>
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