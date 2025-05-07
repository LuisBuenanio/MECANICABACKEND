@extends('adminlte::page')

@section('title', 'Grupos de Investigación')

@section('content_header')
    <h1>Editar Grupo de Investigación</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($grupoInvestigacion, ['route' => ['admin.gruposinvestigacion.update', $grupoInvestigacion->id], 'method' => 'put', 'autocomplete' => 'off', 'files' => true]) !!}
            @include('admin.gruposinvestigacion.partials2.grupo')
            @include('admin.gruposinvestigacion.partials2.investigador')
            {{-- @include('admin.gruposinvestigacion.partials.linea') --}}
            @include('admin.gruposinvestigacion.partials2.programa')


            
            {!! Form::submit('Actualizar Grupo de Investigación', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}

        </div>

    </div>
@stop
@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop


@section('js')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>    
     <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Bootstrap JS (cargado después de jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <script>
        ClassicEditor
            .create(document.querySelector('#mision'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#vision'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#objetivo'))
            .catch(error => {
                console.error(error);
            });

        //Cambiar Imagen
        document.getElementById("portada").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var portada = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(portada);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const lineasInvestigacionContainer = document.getElementById('lineas-container');
            const programasContainer = document.getElementById('programas-container');
            const programasCheckboxes = document.getElementById('checkbox-programas');

            // Manejar cambios en la selección de líneas de investigación
            $(lineasInvestigacionContainer).on('change', '.linea-checkbox', function() {
                // Obtener las líneas seleccionadas
                const lineasSeleccionadas = $('.linea-checkbox:checked').map(function() {
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
                    data: {
                        lineas: lineasSeleccionadas
                    },
                    success: function(data) {
                        // Llenar dinámicamente la lista de programas con los datos recibidos
                        llenarProgramas(data);
                    },
                    error: function(error) {
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

        $(document).ready(function() {
            if (typeof $.fn.modal === 'undefined') {
                console.error(
                    'La función modal no está disponible. Asegúrate de que Bootstrap JavaScript se ha cargado correctamente.'
                );
            }
        });


        $(document).ready(function() {
            // Inicializar Select2
            function inicializarSelect2() {
                $('.select2').select2({
                    width: '100%', // Ajusta el ancho del select al 100%
                });
            }

            // Lógica para agregar dinámicamente más filas de investigadores
            $('#btn-add-investigador').on('click', function() {
                var nuevaFila = `
            <tr id="investigador${contadorinvestigadores}">
                <td>
                    {!! Form::select(
                        'investigadores[]',
                        ['' => 'Seleccione un investigador'] + $investigadores->pluck('nombre_completo', 'id')->all(),
                        null,
                        ['class' => 'form-control select2', 'data-placeholder' => 'Seleccione un investigador'],
                    ) !!}
                </td>
                
                <td>
                    {!! Form::button('Eliminar', ['type' => 'button', 'class' => 'btn btn-danger btn-remove-investigador']) !!}
                </td>
            </tr>
        `;
                contadorinvestigadores++;
                $('#investigador_table tbody').append(nuevaFila);
                inicializarSelect2(); // Reinicializar Select2 en el nuevo elemento
            });

            // Lógica para eliminar filas de investigador
            $(document).on('click', '.btn-remove-investigador', function() {
                $(this).closest('tr').remove();
            });

            // Objeto para almacenar el investigador seleccionado en cada fila
            var investigadoresSeleccionados = {};

            // Resto del código sin cambios

            $('#btnGuardarInvestigador').on('click', function() {
                // Obtener los datos del formulario del modal
                var nombre = $('#nombre').val();
                var email = $('#email').val();
                var tipo_investigador_id = $('#tipo_investigador_id').val();

                console.log(nombre, email, tipo_investigador_id);

                // Validar si los campos requeridos están vacíos
                if (!nombre || !email || !tipo_investigador_id) {
                    // Mostrar mensaje de error al usuario
                    mostrarMensajeError('Por favor, complete todos los campos obligatorios.');
                    setTimeout(function() {
                        $('#modalAgregarInvestigador').modal('hide');
                    }, 2000); // Espera 2 segundos antes de cerrar el modal
                    return; // Detener la ejecución si hay campos vacíos
                }

                // Enviar la solicitud AJAX para guardar el investigador
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.investigador.store') }}',
                    data: {
                        nombre: nombre,
                        email: email,
                        tipo_investigador_id: tipo_investigador_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Si la operación es exitosa, cierra el modal
                        cerrarModalYMostrarMensaje(response.investigadorId, nombre);
                        // Agregar el nuevo investigador a la tabla
                        actualizarSelect2investigadores
                            (); // Actualizar el Select2 de investigadores
                        console.log(response.investigadorId);
                    },
                    error: function(xhr, status, error) {
                        // Si hay un error en la solicitud AJAX, muestra el mensaje de error
                        var errorMessage = 'Error al enviar la solicitud AJAX.';

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            // Si hay errores de validación, muestra el primer mensaje de error
                            errorMessage = Object.values(xhr.responseJSON.errors)[0][0];
                        }

                        mostrarMensajeError(errorMessage);
                        console.error('Error al enviar la solicitud AJAX:', error);
                        console.log(xhr.responseText);
                    }
                });

                function mostrarMensajeError(mensaje) {
                    // Mostrar el mensaje de error en el área correspondiente
                    $('#mensaje-error').text(mensaje).fadeIn().delay(1000)
                        .fadeOut(); // Mostrar durante 5 segundos y luego ocultar
                }

                function cerrarModalYMostrarMensaje(investigadorId, nombre) {
                    // Cierra el modal después de un breve retraso y muestra un mensaje
                    setTimeout(function() {
                        $('#modalAgregarInvestigador').modal('hide');
                        agregarNuevoinvestigador(investigadorId, nombre);
                        actualizarSelect2investigadores();
                        console.log(investigadorId);
                    }, 500); // Espera 2 segundos antes de cerrar el modal
                }

            });


            function agregarNuevoinvestigador(investigadorId, nombreinvestigador) {
                $('#nombre').val('');
                $('#email').val('');
                $('#tipo_investigador_id').val('').trigger('change');
                mostrarMensajeExito('Investigador agregado correctamente');
                // Verificar si ya existe una fila con el mismo ID de investigador
                if (investigadoresSeleccionados.hasOwnProperty(investigadorId)) {
                    // Si existe, actualizar los datos en la fila existente
                    var filaExistente = investigadoresSeleccionados[investigadorId];


                } else {
                    // Si no existe, crear una nueva fila con el investigador seleccionado
                    var nuevaFila = `
                    <tr id="investigador${investigadorId}">
                        <td>
                            <select name="investigadores[]" class="form-control select2 select2-investigadores" data-placeholder="Seleccione un investigador">
                                <option value="${investigadorId}" selected>${nombreinvestigador}</option>
                                @foreach ($investigadores as $investigador)
                                    <option value="{{ $investigador->id }}">{{ $investigador->nombre_completo }}</option>
                                @endforeach
                            </select>
                        </td>
                        
                        <td>
                            {!! Form::button('Eliminar', ['type' => 'button', 'class' => 'btn btn-danger btn-remove-investigador']) !!}
                        </td>
                    </tr>
                `;
                    contadorinvestigadores++;
                    $('#investigador_table tbody').append(nuevaFila);
                    inicializarSelect2(); // Reinicializar Select2 en el nuevo elemento

                    // Guardar la referencia a la nueva fila en el objeto de investigadores seleccionados
                    investigadoresSeleccionados[investigadorId] = $('#investigador_table tbody').find(
                        `tr#investigador${investigadorId}`);
                }

                // Restablecer los campos del formulario del modal
                $('#cantidad').val('');
                $('#indicaciones').val('');
            }

            function actualizarSelect2investigadores() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.investigador.lista') }}', // Ajusta la ruta según corresponda
                    dataType: 'json',
                    success: function(data) {
                        // Obtener el Select2 de investigadores
                        var select2investigadores = $('.select2.select2-investigadores');

                        // Guardar la selección actual del Select2
                        var selectedOption = select2investigadores.val();

                        // Vaciar el Select2 y agregar las nuevas opciones
                        select2investigadores.empty();
                        select2investigadores.append($('<option></option>').attr('value', '').text(
                            'Seleccione un investigador'));
                        $.each(data, function(key, value) {
                            select2investigadores.append($('<option></option>').attr('value',
                                key).text(value));
                        });

                        // Restaurar la selección anterior en el Select2
                        select2investigadores.val(selectedOption).trigger('change');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }

            function mostrarMensajeExito(mensaje) {
                // Muestra el mensaje de éxito en un elemento HTML
                $('#mensaje-exito').text(mensaje).fadeIn().delay(1000)
                    .fadeOut(); // Mostrar durante 2 segundos y luego ocultar
            }


            // Contador para identificar filas de investigadores
            var contadorinvestigadores = 1;
            inicializarSelect2();
        });
    </script>
@stop
