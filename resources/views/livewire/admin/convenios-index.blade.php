<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Buscar por: Nombre - Coordinador - Tipo de Convenio">

    </div>
    @if ($convenios->count())
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo Convenio</th>
                            <th>Coordinador</th>
                            <th>Fecha Legalización</th>
                            <th>Vigencia</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($convenios as $convenio)
                                <tr>
                                    <td>{{$convenio->id}}</td>
                                    <td>{{$convenio->nombre}}</td>
                                    <td>{!!$convenio->tipo_convenio->descripcion!!}</td>
                                    <td>{!!$convenio->coordinador!!}</td>
                                    <td>{!!$convenio->fecha_legalizacion!!}</td>
                                    <td>{!!$convenio->vigencia!!}</td>
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.convenio.edit', $convenio->id)}}">Editar</a>
                                    </td with="10px">  
                                    <td>
                                        <form action="{{route('admin.convenio.destroy', $convenio->id)}}" method="POST" class="form-eliminar">
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
            {{$convenios->links()}}
        </div>
        @else
            <div class="card-body">
                <strong>No existen registros ......</strong>
            </div>
        @endif

</div>