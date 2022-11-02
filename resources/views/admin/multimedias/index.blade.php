@extends('adminlte::page')

@section('title', 'Mecánica Espoch')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.autoridades.create')}}">Nuevo Autoridad</a>
    <h1>Listado de Autoridades</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        
        @if ($multimedias->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de Galería</th>                            
                            <th>Imagen</th>
                            <th colspan="2"></th>
                        </tr>
    
                        <tbody>
                            @foreach ($multimedias as $multimedia)
                                <tr>
                                    <td>{{$multimedia->id}}</td>
                                    <td>{{$multimedia->galeria->nombre}}</td>
                                    
                                    <td><div class="lg:col-span-2">
                                        <figure class="flex justify-center">
                                            @if($multimedia->url) 
                                                <a href="{{asset('img/galerias/imagenes/'.$multimedia->url)}}" class="ed-item base-100 web-30">
                                                    <img class =" prueba object-cover object-center" src="{{asset('img/galerias/imagenes/'.$multimedia->url)}}" alt="">
                                                </a>
                                            @else
                                                <a href="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" class="ed-item base-100 web-30">
                                                    <img class ="prueba object-cover object-center" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" alt="">
                                                </a>
                                            @endif
                        
                                        </figure>                        
                                        
                                    </div>
                                    
                                    <td with="10px">
                                        <a class="btn btn-primary btn-sm " href="{{route('admin.multimedias.edit', $multimedia)}}">Editar</a>
                                    </td with="10px">
                                    <td>
                                        <form action="{{route('admin.multimedias.destroy', $multimedia)}}" method="POST"  class="form-eliminar">
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
        @else
            <div class="card-body">
                <strong>No existen registros ......</strong>
            </div>
        @endif
    
    </div>
    
@stop
@section('css')
    <style>
        .prueba{
            height: 180px;
            width: 340px;
            margin: auto;
            
        }
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                    '¡Eliminado!',
                    'La imagen se eliminó correctamente.',
                    'success'
            )
        </script>
        
    @endif

    <script> 
        $('.form-eliminar').submit(function(e){
            e.preventDefault();      
    
            Swal.fire({
            title: '¿Estás Seguro?',
            text: "Esta imagen se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
                this.submit();
            }
            })
        });
    </script>


@stop