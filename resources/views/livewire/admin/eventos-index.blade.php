<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Buscar por: Título o Descripción del evento">

    </div>

    @if ($eventos->count())
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>   
                            <th>Fecha Inicio</th>   
                            <th>Fecha Final</th>                                                
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($eventos as $evento)
                                <tr>
                                    <td>{{$evento->id}}</td>
                                    <td>{{$evento->titulo}}</td>
                                    <td>{!!$evento->descripcion!!}</td> 
                                    <td>{{$evento->fecha_inicio}}</td>   
                                    <td>{{ $evento->fecha_fin }}</td>
                                    <td>
                                        @if($evento->estado == 2)
                                            <span class="badge badge-success">Publicado</span>
                                        @else
                                            <span class="badge badge-danger">Borrador</span>
                                        @endif
                                    </td>
                                    
                                                               
                                                                       

                                    
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.eventos.edit', $evento->id)}}">Editar</a>
                                    </td with="10px">  
                                    <td>
                                        <form action="{{route('admin.eventos.destroy', $evento->id)}}" method="POST" class="form-eliminar">
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
            {{$eventos->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif    
</div>
