<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder ="Ingrese el nombre o correo del usuario">

        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th colspan="2"></th>
                        </tr>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>                                
                                    <td>{{$user->email}}</td>
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.users.edit', $user)}}">Asignar Rol</a>
                                    </td with="10px">
                                    <td>
                                        <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="form-eliminar">
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
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No existen registros ......</strong>
            </div>
        @endif

    </div>
</div>