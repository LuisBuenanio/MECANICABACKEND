<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Ingrese el nombre de la slider">

    </div>
    @if ($sliders->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th colspan="2"></th>
                    </tr>

                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->name }}</td>
                            <td>
                                @if ($slider->estado == 1)
                                    No Publicado
                                @elseif ($slider->estado == 2)
                                    Publicado
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('img/slider/' . $slider->s_imagen) }}" alt="{{ $slider->name }}"
                                    style="max-width: 300px;">
                            </td>
                            <td with="10px">
                                <a class="btn btn-primary btn-sm "
                                    href="{{ route('admin.slider.edit', $slider->id) }}">Editar</a>
                            </td with="10px">
                            <td>
                                <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST"
                                    class="form-eliminar">
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
            {{ $sliders->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif

</div>
