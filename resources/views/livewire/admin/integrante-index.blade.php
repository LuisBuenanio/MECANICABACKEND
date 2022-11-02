<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Ingrese el nombre del Integrante">

    </div>
    @if ($integrantes->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>

                    <tbody>
                        @foreach ($integrantes as $integrante)
                            <tr>
                                <td>{{$integrante->id}}</td>
                                <td>{{$integrante->nombre}}</td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm " href="{{route('admin.integrantes.edit', $integrante)}}">Editar</a>
                                </td with="10px">
                                <td>
                                    <form action="{{route('admin.integrantes.destroy', $integrante)}}" method="POST" class="form-eliminar">
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
            {{$integrantes->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif

</div>