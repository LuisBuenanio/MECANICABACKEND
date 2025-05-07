<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Buscar por: Nombre - Email - Título del Docente">

    </div>

    @if ($docentes->count())
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Título</th>                         
                            <th>Foto</th>      
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($docentes as $docente)
                                <tr>
                                    <td>{{$docente->id}}</td>
                                    <td>{{$docente->nombre}}</td>
                                    <td>{!!$docente->email!!}</td>   
                                    <td>{{$docente->titulo}}</td>
                                    <td>
                                        <img src="{{ asset('img/docentes/' . $docente->foto) }}" alt="{{ $docente->nombre }}"
                                            style="max-width: 100px;">
                                    </td>                                   
                                                                       
                                    
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.docentes.edit', $docente->id)}}">Editar</a>
                                    </td with="10px">  
                                    <td>
                                        <form action="{{route('admin.docentes.destroy', $docente->id)}}" method="POST" class="form-eliminar">
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
            {{$docentes->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif    
</div>
