<div class="col-md-6">
    {!! Form::label('name', 'Nombre:', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : ''), 'required' => 'required']) !!}
    @error('name')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('lastname', 'Apellido:', ['class' => 'form-label']) !!}
    {!! Form::text('lastname', null, ['class' => 'form-control'. ($errors->has('lastname') ? ' is-invalid' : ''), 'required' => 'required']) !!}
    @error('lastname')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('weight', 'Peso (en kg):', ['class' => 'form-label']) !!}
    {!! Form::text('weight', null, ['class' => 'form-control'. ($errors->has('weight') ? ' is-invalid' : ''), 'required' => 'required']) !!}
    @error('weight')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('height', 'Altura (en m):', ['class' => 'form-label']) !!}
    {!! Form::text('height', null, ['class' => 'form-control'. ($errors->has('height') ? ' is-invalid' : ''), 'required' => 'required']) !!}
    @error('height')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('sex', 'Sexo:', ['class' => 'form-label']) !!}
    {!! Form::select('sex', ['hombre' => 'Hombre', 'mujer' => 'Mujer'], null, ['class' => 'form-select'. ($errors->has('sex') ? ' is-invalid' : ''), 'required' => 'required', 'placeholder' => 'Elige uno']) !!}
    @error('sex')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>  
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('age', 'Edad:', ['class' => 'form-label']) !!}
    {!! Form::text('age', null, ['class' => 'form-control'. ($errors->has('age') ? ' is-invalid' : ''), 'required' => 'required']) !!}
    @error('age')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('date_of_birth', 'Fecha de nacimiento:', ['class' => 'form-label']) !!}
    {!! Form::date('date_of_birth', null, ['class' => 'form-control'. ($errors->has('date_of_birth') ? ' is-invalid' : ''), 'required' => 'required']) !!}
    @error('date_of_birth')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('code', 'Code:', ['class' => 'form-label']) !!}
    {!! Form::text('code', null, ['class' => 'form-control'. ($errors->has('code') ? ' is-invalid' : ''), 'required' => 'required']) !!}
    @error('code')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
