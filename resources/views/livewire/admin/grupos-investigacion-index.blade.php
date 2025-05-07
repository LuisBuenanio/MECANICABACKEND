<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Buscar por: Código - Siglas - Nombre">

    </div>
    @if ($grupos_investigaciones->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Siglas</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Portada</th>
                        <th colspan="2"></th>
                    </tr>

                    <tbody>
                        @foreach ($grupos_investigaciones as $grupo_investigacion)
                            <tr>
                                <td>{{$grupo_investigacion->id}}</td>
                                <td>{{$grupo_investigacion->codigo}}</td>
                                <td>{{$grupo_investigacion->siglas}}</td>
                                <td>{{$grupo_investigacion->nombre_gr}}</td>                             
                                <td>
                                    @if($grupo_investigacion->estado == 2)
                                        <span class="badge badge-success">Publicado</span>
                                    @else
                                        <span class="badge badge-danger">Borrador</span>
                                    @endif
                                </td> 
                                
                                <td>
                                    <img src="{{ asset('img/grupos-investigacion/' . $grupo_investigacion->portada) }}" alt="{{ $grupo_investigacion->nombre }}"
                                        style="max-width: 100px;">
                                </td>  
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm " href="{{route('admin.gruposinvestigacion.edit', $grupo_investigacion->id)}}">Editar</a>
                                </td with="10px">
                                <td>
                                    <form action="{{route('admin.gruposinvestigacion.destroy', $grupo_investigacion->id)}}" method="POST" class="form-eliminar">
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
            {{$grupos_investigaciones->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif

</div>
