@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.tipoautoridad.create')}}">Nuevo Tipo Autoridad</a>
    <h1>Listado Tipo de Autoridades</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        
        @if ($tipo_autoridades->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripcion</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($tipo_autoridades as $tipo_autoridad)
                                <tr>
                                    <td>{{$tipo_autoridad->id}}</td>
                                    <td>{{$tipo_autoridad->descripcion}}</td>
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.tipoautoridad.edit', $tipo_autoridad)}}">Editar</a>
                                    </td with="10px">
                                    <td>
                                        <form action="{{route('admin.tipoautoridad.destroy', $tipo_autoridad)}}" method="POST" class="form-eliminar">
                                            @csrf
                                            @method('DELETE')
    
                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
    
                                    </td>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                    '¡Eliminado!',
                    'El tipo de autoridad se eliminó correctamente.',
                    'success'
            )
        </script>
        
    @endif

    <script> 
        $('.form-eliminar').submit(function(e){
            e.preventDefault();      
    
            Swal.fire({
            title: '¿Estás Seguro?',
            text: "Este tipo de autoridad se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
                this.submit();
            }
            })
        });
    </script>
@stop