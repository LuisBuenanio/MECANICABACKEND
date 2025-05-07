<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Ingrese el nombre de la galeria">

    </div>
    @if ($galerias->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>

                    <tbody>
                        @foreach ($galerias as $galeria)
                            <tr>
                                <td>{{$galeria->id}}</td>
                                <td>{{$galeria->nombre}}</td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm " href="{{route('admin.galerias.edit', $galeria->id)}}">Editar</a>
                                </td with="10px">
                                <td>
                                    <form action="{{route('admin.galerias.destroy', $galeria->id)}}" method="POST" class="form-eliminar">
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
            {{$galerias->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif

</div>
