@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.convenio.create')}}">Nuevo Convenio</a>
    <h1>Listado de Convenios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        
        @if ($convenios->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Objetivo</th>
                            <th>Coordinador</th>
                            <th>Fecha Legalización</th>
                            <th>Vigencia</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($convenios as $convenio)
                                <tr>
                                    <td>{{$convenio->id}}</td>
                                    <td>{{$convenio->nombre}}</td>
                                    <td>{!!$convenio->objetivo!!}</td>
                                    <td>{!!$convenio->coordinador!!}</td>
                                    <td>{!!$convenio->fecha_legalizacion!!}</td>
                                    <td>{!!$convenio->vigencia!!}</td>
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.convenio.edit', $convenio)}}">Editar</a>
                                    </td with="10px">  
                                    <td>
                                        <form action="{{route('admin.convenio.destroy', $convenio)}}" method="POST" class="form-eliminar">
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
                'El convenio se eliminó correctamente.',
                'success'
        )
    </script>
    
@endif

<script> 
    $('.form-eliminar').submit(function(e){
        e.preventDefault();      

        Swal.fire({
        title: '¿Estás Seguro?',
        text: "Este convenio se eliminará definitivamente",
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