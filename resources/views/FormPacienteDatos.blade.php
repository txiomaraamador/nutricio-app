<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
    {!! Form::label('weight', 'Peso:', ['class' => 'form-label']) !!}
    <div class="input-group has-validation">
        {!! Form::text('weight', null, ['class' => 'form-control'. ($errors->has('weight') ? ' is-invalid' : ''), 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su peso aquí. Ingrese su peso en kg. Ejemplo: 65.9">
            <i class="bi bi-question-circle" style=" opacity: 0.5;"></i>
        </span>
        @error('weight')
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
    {!! Form::label('height', 'Altura:', ['class' => 'form-label']) !!}
    <div class="input-group has-validation">
        {!! Form::text('height', null, ['class' => 'form-control'. ($errors->has('height') ? ' is-invalid' : ''), 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su codigo aquí. Ingrese su altura en metros. Ejemplo: 1.70">
            <i class="bi bi-question-circle" style=" opacity: 0.5;"></i>
        </span>
        @error('height')
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
    <div class="input-group has-validation">
        {!! Form::text('code', null, ['class' => 'form-control'. ($errors->has('code') ? ' is-invalid' : ''), 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese su codigo aquí. No debe contener mas de 8 caracteres.">
            <i class="bi bi-question-circle" style=" opacity: 0.5;"></i>
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
@if(isset($patient) && $patient->avatar)
<div class="mb-3">
    {!! Form::label('current_image', 'Imagen actual:', ['class' => 'form-label']) !!}
    <img src="{{ asset('avatars/' . $patient->avatar) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
</div>
@endif
<div class="mb-3">
    {!! Form::label('image', 'Seleccionar una foto', ['class' => 'form-label']) !!}
    {!! Form::file('avatar', ['class' => 'form-control']) !!}
</div>