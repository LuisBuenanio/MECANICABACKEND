<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Buscar por: Nombre - Email - Título de la maestria">

    </div>
    

    @if ($maestrias->count())
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Título</th>
                            <th>Duración</th>                         
                            <th>Portada</th>      
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($maestrias as $maestria)
                                <tr>
                                    <td>{{$maestria->id}}</td>
                                    <td>{{$maestria->nombre}}</td>
                                    <td>{!!$maestria->titulo!!}</td>   
                                    <td>{{$maestria->duracion}}</td>
                                    <td>
                                        <img src="{{ asset('img/maestrias/' . $maestria->foto) }}" alt="{{ $maestria->nombre }}"
                                            style="max-width: 100px;">
                                    </td>                                   
                                                                       
                                    
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.maestrias.edit', $maestria->id)}}">Editar</a>
                                    </td with="10px">  
                                    <td>
                                        <form action="{{route('admin.maestrias.destroy', $maestria->id)}}" method="POST" class="form-eliminar">
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
            {{$maestrias->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif    
</div>
