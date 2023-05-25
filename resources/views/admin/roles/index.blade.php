@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.roles.create')}}">Crear Nuevo Rol</a>
    <h1>Lista Rol</h1>
@stop

@section('content')

    @if(session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
    @endif
    <div class="card">
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="form-eliminar">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                    '¡Eliminado!',
                    'El role se eliminó correctamente.',
                    'success'
            )
        </script>
        
    @endif
    
    <script> 
        $('.form-eliminar').submit(function(e){
            e.preventDefault();      
    
            Swal.fire({
            title: '¿Estás Seguro?',
            text: "Este role se eliminará definitivamente",
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