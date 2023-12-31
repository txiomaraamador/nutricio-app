<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="col-md-6">
    {!! Form::label('type_name', 'Tipo de comida:', ['class' => 'form-label']) !!}
    {!! Form::select('type_name', ['Comida' => 'Comida', 'Cena' => 'Cena', 'Desayuno' => 'Desayuno', 'Colacion' => 'Colacion'], null, ['class' => 'form-select'. ($errors->has('type_name') ? ' is-invalid' : ''), 'id' => 'type_name', 'required' => 'required', 'placeholder' => 'Elige uno']) !!}
    @error('type_name')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('date', 'Fecha:', ['class' => 'form-label']) !!}
    {!! Form::date('date', null, ['class' => 'form-control'. ($errors->has('date') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
    @error('date')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('hour', 'Hora:', ['class' => 'form-label']) !!}
    <div class="input-group has-validation">
        {!! Form::datetime('hour', null, ['class' => 'form-control'. ($errors->has('hour') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la hora aquí. Debe tener formto HH:MM.">
            <i class="bi bi-question-circle" style=" opacity: 0.5;"></i>
        </span> 
        @error('hour')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
        @enderror
        <div class="valid-feedback">
            Looks good!
        </div>
    </div> 
</div>