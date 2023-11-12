<div class="col-md-6">
    {!! Form::label('type', 'Tipo de comida:', ['class' => 'form-label']) !!}
    {!! Form::select('type', ['Comida' => 'Comida', 'Cena' => 'Cena', 'Desayuno' => 'Desayuno', 'Colacion' => 'Colación'], null, ['class' => 'form-select'. ($errors->has('type') ? ' is-invalid' : ''), 'id' => 'type', 'required' => 'required', 'placeholder' => 'Elige uno']) !!}
    @error('type')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('content', 'Contenido de la comida:', ['class' => 'form-label']) !!}
    <div class="input-group has-validation">
        {!! Form::text('content', null, ['class' => 'form-control'. ($errors->has('content') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el contenido aquí. Debe contener una longitud maxima de 255 caracteres.">
            <img src="/images/pregunta.jpg" style="width: 20px; opacity: 0.5;">
        </span>
        @error('content')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
        @enderror
        <div class="valid-feedback">
            Looks good!
        </div>
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
            <img src="/images/pregunta.jpg" style="width: 20px; opacity: 0.5;">
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