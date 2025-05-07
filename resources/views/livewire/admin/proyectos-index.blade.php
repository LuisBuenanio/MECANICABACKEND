<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Buscar por: Nombre - Coordinador - Tipo de Proyecto">

    </div>

    @if ($proyectos->count())
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Coordinador</th>
                            <th>Tipo Proyecto</th>                         
                            <th>Público</th>                                                 
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($proyectos as $proyecto)
                                <tr>
                                    <td>{{$proyecto->id}}</td>
                                    <td>{{$proyecto->codigo}}</td>
                                    <td>{{$proyecto->nombre}}</td>
                                    <td>{!!$proyecto->coordinador!!}</td>                                    
                                    <td>{!!$proyecto->tipo_proyecto->descripcion!!}</td>
                                    <td>{{ $proyecto->estado == 1 ? 'No Publicado' : 'Publicado' }}</td>
                                    <td>
                                        @if($proyecto->ejecutandose == 1)
                                            <span class="badge badge-success">En Ejecución</span>
                                        @else
                                            <span class="badge badge-danger">Ejecutado</span>
                                        @endif
                                    </td>
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.proyectos.edit', $proyecto->id)}}">Editar</a>
                                    </td with="10px">  
                                    <td>
                                        <form action="{{route('admin.proyectos.destroy', $proyecto->id)}}" method="POST" class="form-eliminar">
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
        <div class="card-footer">
            {{$proyectos->links()}}
        </div>
        @else
            <div class="card-body">
                <strong>No existen registros ......</strong>
            </div>
        @endif    
</div>
