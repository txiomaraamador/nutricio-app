<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('flog_type', 'Selecciona el Tipo de Flogs:', ['class' => 'form-label']) !!}
                {!! Form::select('flog_type', $flogs->pluck('type', 'id'), null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Elegir tipo de alimento',]) !!}
            </div>

            <div class="col-md-4">
                {!! Form::label('flogs', 'Selecciona los Flogs:', ['class' => 'form-label']) !!}
                {!! Form::select('flogs[]', $flogs->pluck('aliment', 'id'), null,['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Eligir un alimento']) !!}
            </div>

            <div class="col-md-4">
                {!! Form::label('cantidad', 'Cantidad:', ['class' => 'form-label']) !!}
                <div class="input-group has-validation">
                    {!! Form::text('code', null, ['class' => 'form-control'. ($errors->has('code') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                    <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su código aquí. No debe contener más de 8 caracteres.">
                        <i class="bi bi-question-circle" style="opacity: 0.5;"></i>
                    </span>
                    @error('code')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('Kcal', 'Kcal') !!}
               
            </div>

            <div class="col-md-4">
                {!! Form::label('protein', 'Proteina') !!}
             
            </div>

            <div class="col-md-4">
                {!! Form::label('carbohydrates', 'Carbohidratos') !!}
               
            </div>
        </div>
         
    </div>
        <button type="button" class="btn btn-danger remove-form float-end"><i class="bi bi-x-circle"></i></button>
     
</div>

