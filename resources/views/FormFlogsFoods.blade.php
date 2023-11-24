<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <td>Selecciona el tipo de alimento</td>
                    <td>Alimento (por 100g)</td>
                    <td>Cantidad (en g)</td>
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
                            {!! Form::select('type', $categoty->pluck('name', 'id'), null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Elegir tipo de alimento',]) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::select('flogs[]', $flogs->pluck('aliment', 'id'), null,['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Seleccione una opcion']) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group ">
                            <div class="input-group has-validation">
                                {!! Form::text('cantidad', null, ['class' => 'form-control'. ($errors->has('code') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                                <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la cantidad de alimento a ingerir. Debe ser en gramos.">
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
                        
                            {!! Form::label('kcal', '00') !!} kcal

                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::label('protein', '0.0') !!} g

                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::label('carbohydrates', '0.0') !!} g

                        </div>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger remove-form float-end"><i class="bi bi-x-circle"></i></button>
                    </td>
                </tr>
                
            </tbody>
            
        </table>

        