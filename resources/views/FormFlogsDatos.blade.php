<div class="col-md-6">
    {!! Form::label('type', 'Tipo de comida:', ['class' => 'form-label']) !!}
    {!! Form::select('type', ['Comida' => 'Comida', 'Cena' => 'Cena', 'Desayuno' => 'Desayuno', 'Colacion' => 'Colación'], null, ['class' => 'form-select', 'id' => 'type', 'required' => 'required', 'placeholder' => 'Elige uno']) !!}
    <div class="valid-feedback">
        ¡Selecciona un tipo de flog!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('content', 'Contenido de la comida:', ['class' => 'form-label']) !!}
    {!! Form::text('content', null, ['class' => 'form-control', 'id' => 'content', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('date', 'Fecha:', ['class' => 'form-label']) !!}
    {!! Form::date('date', null, ['class' => 'form-control', 'id' => 'content', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('hour', 'Hora:', ['class' => 'form-label']) !!}
    {!! Form::datetime('hour', null, ['class' => 'form-control', 'id' => 'content', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>