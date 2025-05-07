<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Ingrese el nombre de la noticia">

    </div>
    @if ($noticias->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Fecha de Publicación</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>

                    <tbody>
                        @foreach ($noticias as $noticia)
                            <tr>
                                <td>{{$noticia->id}}</td>
                                <td>{{$noticia->titulo}}</td>
                                <td>{{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d-m-Y') }}</td>

                                <td>
                                    @if($noticia->estado == 2)
                                        <span class="badge badge-success">Publicado</span>
                                    @else
                                        <span class="badge badge-danger">Borrador</span>
                                    @endif
                                </td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm " href="{{route('admin.noticias.edit', $noticia->id)}}">Editar</a>
                                </td with="10px">
                                <td>
                                    <form action="{{route('admin.noticias.destroy', $noticia->id)}}" method="POST" class="form-eliminar">
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
            {{$noticias->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif

</div>
