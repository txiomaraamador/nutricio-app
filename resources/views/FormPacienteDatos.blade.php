<div class="col-md-6">
    {!! Form::label('name', 'Nombre:', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('lastname', 'Apellido:', ['class' => 'form-label']) !!}
    {!! Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('weight', 'Peso (en kg):', ['class' => 'form-label']) !!}
    {!! Form::text('weight', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('height', 'Altura (en m):', ['class' => 'form-label']) !!}
    {!! Form::text('height', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('sex', 'Sexo:', ['class' => 'form-label']) !!}
    {!! Form::select('sex', ['hombre' => 'Hombre', 'mujer' => 'Mujer'], null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Elige uno']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('age', 'Edad:', ['class' => 'form-label']) !!}
    {!! Form::text('age', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('date_of_birth', 'Fecha de nacimiento:', ['class' => 'form-label']) !!}
    {!! Form::date('date_of_birth', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('code', 'Code:', ['class' => 'form-label']) !!}
    {!! Form::text('code', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
