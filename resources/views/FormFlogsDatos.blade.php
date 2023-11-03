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
    {!! Form::text('content', null, ['class' => 'form-control'. ($errors->has('content') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
    @error('content')
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
    {!! Form::datetime('hour', null, ['class' => 'form-control'. ($errors->has('hour') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
    @error('hour')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>