<div class="card">
    <div class="card-body">
        <h2 class="text-center">Investigadores</h2>
        <div class="container">
            <div class="form-group">
                <div class="card">
                    <div class="card-header">
                        {!! Form::label('', 'Investigadores:') !!}
                    </div>
                    <div class="card-body">
                        <!-- Botón para abrir el modal -->
                        {!! Form::button('Crear Investigador', [
                            'class' => 'btn btn-secondary',
                            'data-toggle' => 'modal',
                            'data-target' => '#modalAgregarInvestigador',
                        ]) !!}

                        <table class="table table-bordered mt-3" id="investigador_table">
                            <thead>
                                <tr>
                                    <th>DATOS DEL INVESTIGADOR</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($investigadoresGrupo as $index => $investigadorGrupo)
                                    <tr id= "investigador{{$index}}">
                                        <td>
                                            {!! Form::select('investigadores[]', $investigadoresSelect, $investigadorGrupo->id, [
                                                'class' => 'form-control select2',
                                                'data-placeholder' => 'Seleccione un Investigador',
                                            ]) !!}
                                            
                                        </td>
                                        <td>{!! Form::button('Eliminar', ['type' => 'button', 'class' => 'btn btn-danger btn-remove-investigador']) !!}</td>
                              
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! Form::button('Agregar investigador', [
                            'type' => 'button',
                            'class' => 'btn btn-primary',
                            'id' => 'btn-add-investigador',
                        ]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div id="mensaje-exito" class="alert alert-success" style="display: none;"></div>

        <div id="mensaje-error" class="alert alert-danger" style="display: none;"></div>


        <!-- Modal para agregar un nuevo investigador -->
        <div class="modal fade" id="modalAgregarInvestigador" tabindex="-1" role="dialog"
            aria-labelledby="modalAgregarInvestigadorLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarInvestigadorLabel">Crear Nuevo Investigador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario para agregar un nuevo investigador -->

                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre :') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre del Investigador']) !!}

                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del Investigador']) !!}

                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="form-group">
                            {!! Form::label('tipo_investigador_id', 'Tipo investigador:') !!}
                            {!! Form::select('tipo_investigador_id', $tipos_investigadores, null, ['class' => 'form-control']) !!} 
                            
                            @error('tipo_investigador_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btnGuardarInvestigador">Guardar Investigador</button>
                            <button type="button" class="btn btn-success ml-auto" data-dismiss="modal">Cerrar</button>
                        </div>
                        
                </div>
            </div>
        </div>
    
    
    </div>
</div>
 
