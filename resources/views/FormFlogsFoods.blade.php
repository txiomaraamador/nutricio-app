<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <td>Selecciona el tipo de alimento</td>
                    <td>Alimento</td>
                    <td>Cantidad</td>
                    <td>Kcal</td>
                    <td>Proteina</td>
                    <td>Carbohidratos</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            {!! Form::select('type', $flogs->pluck('type', 'id'), null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Elegir tipo de alimento',]) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::select('flogs[]', $flogs->pluck('aliment', 'id'), null,['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Eligir un alimento']) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group ">
                            <div class="input-group has-validation">
                                {!! Form::text('cantidad', null, ['class' => 'form-control'. ($errors->has('code') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                                <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su código aquí. No debe contener más de 8 caracteres.">
                                    <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                                </span>
                                @error('cantidad')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}  
                                </div>
                                @enderror
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            50
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            50
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                          50
                        </div>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger remove-form float-end"><i class="bi bi-x-circle"></i></button>
                    </td>
                </tr>
                
            </tbody>
            
        </table>

        