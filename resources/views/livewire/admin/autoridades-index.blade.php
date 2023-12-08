<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Ingrese el nombre de la Autoridad">

    </div>
    @if ($autoridades->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo Autoridad</th>
                        <th colspan="2"></th>
                    </tr>

                    <tbody>
                        @foreach ($autoridades as $autoridad)
                            <tr>
                                <td>{{$autoridad->id}}</td>
                                <td>{{$autoridad->nombre}}</td>                                
                                <td>{{$autoridad->tipo_autoridad->descripcion}}</td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm " href="{{route('admin.autoridades.edit', $autoridad->id)}}">Editar</a>
                                </td with="10px">
                                <td>
                                    <form action="{{route('admin.autoridades.destroy', $autoridad->id)}}" method="POST" class="form-eliminar">
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
            {{$autoridades->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif

</div>
