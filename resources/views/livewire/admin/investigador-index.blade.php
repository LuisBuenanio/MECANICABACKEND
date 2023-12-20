<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Buscar por: Nombre - Email - Tipo de investigador">

    </div>

    @if ($investigadores->count())
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Tipo investigador</th>  
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($investigadores as $investigador)
                                <tr>
                                    <td>{{$investigador->id}}</td>
                                    <td>{{$investigador->nombre}}</td>
                                    <td>{!!$investigador->email!!}</td>                                    
                                    <td>{!!$investigador->tipo_investigador->descripcion!!}</td>
                                   
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.investigador.edit', $investigador->id)}}">Editar</a>
                                    </td with="10px">  
                                    <td>
                                        <form action="{{route('admin.investigador.destroy', $investigador->id)}}" method="POST" class="form-eliminar">
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
            {{$investigadores->links()}}
        </div>
        @else
            <div class="card-body">
                <strong>No existen registros ......</strong>
            </div>
        @endif    
</div>
