@extends('adminlte::page')

@section('title', 'Grupos de Investigación')

@section('content_header')
    <h1>Crear Nuevo Grupo de Investigación</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.gruposinvestigacion.store', 'autocomplete' => 'off', 'files' => true])!!}

                @include('admin.gruposinvestigacion.partials.grupo'){{-- 
                @include('admin.gruposinvestigacion.partials.investigador') --}}
                @include('admin.gruposinvestigacion.partials.linea'){{-- 
                @include('admin.gruposinvestigacion.partials.programa') --}}


                {!! Form:: submit('Crear Grupo de Investigación',['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>

    </div>
@stop
@section('css')
    <style>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
       

    <script>
        
        ClassicEditor
            .create( document.querySelector( '#mision' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#vision' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#objetivo' ) )
            .catch( error => {
                console.error( error );
            } ); 

        //Cambiar Imagen
        document.getElementById( "portada").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var portada = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(portada);
        }

        document.addEventListener('DOMContentLoaded', function () {
        const lineasInvestigacionContainer = document.getElementById('lineas-container');
        const programasContainer = document.getElementById('programas-container');
        const programasCheckboxes = document.getElementById('checkbox-programas');

        // Manejar cambios en la selección de líneas de investigación
        $(lineasInvestigacionContainer).on('change', '.linea-checkbox', function () {
            // Obtener las líneas seleccionadas
            const lineasSeleccionadas = $('.linea-checkbox:checked').map(function () {
                return $(this).val();
            }).get();

            // Limpiar la lista de programas
            programasCheckboxes.innerHTML = '';

            // Hacer una solicitud AJAX solo si hay líneas seleccionadas
            if (lineasSeleccionadas.length > 0) {
                programasContainer.style.display = 'block';
                // Hacer una solicitud AJAX para obtener los programas asociados a las líneas seleccionadas
                obtenerProgramas(lineasSeleccionadas);
            } else {
                programasContainer.style.display = 'none';
            }
        });

        // Función para hacer la solicitud AJAX y obtener programas
        function obtenerProgramas(lineasSeleccionadas) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: "{{ route('obtener.programas') }}", // Ajusta según tu ruta
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: { lineas: lineasSeleccionadas },
                success: function (data) {
                    // Llenar dinámicamente la lista de programas con los datos recibidos
                    llenarProgramas(data);
                },
                error: function (error) {
                    console.error('Error al obtener programas:', error);
                }
            });
        }

        // Función de ejemplo para llenar dinámicamente la lista de programas
        function llenarProgramas(programas) {
            programas.forEach(programa => {
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'programas_investigacion[]';
                checkbox.value = programa.id;
                checkbox.className = 'form-check-input programa-checkbox';

                const label = document.createElement('label');
                label.textContent = programa.descripcion;
                label.className = 'form-check-label';

                const div = document.createElement('div');
                div.className = 'form-check';
                div.appendChild(checkbox);
                div.appendChild(label);

                programasCheckboxes.appendChild(div);
            });
        }
    });

    </script>
@stop