<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="col-md-6">
    {!! Form::label('type', 'Tipo de Alimento:', ['class' => 'form-label']) !!}
    {!! Form::select('type', ['Verdura y hortalizas' => 'Verdura y hortalizas', 'Fruta' => 'Fruta', 'Legumbres, arroz y pasta' => 'Legumbres, arroz y pasta', 'Leche o derivados' => 'Leche o derivados','Carne o embutidos' => 'Carne o embutidos','Pescado' => 'Pescado','Panaderia o dulces' => 'Panadera o dulces'], null, ['class' => 'form-select'. ($errors->has('type') ? ' is-invalid' : ''), 'id' => 'type', 'required' => 'required', 'placeholder' => 'Elige uno']) !!}
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
    {!! Form::label('aliment', 'Alimento:', ['class' => 'form-label']) !!}
    {!! Form::text('aliment', null, ['class' => 'form-control'. ($errors->has('aliment') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
    @error('aliment')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
    <div class="valid-feedback">
        Looks good!
    </div>
</div>
<div class="col-md-6">
    {!! Form::label('kcal', 'Calorias:', ['class' => 'form-label']) !!}
    <div class="input-group has-validation">
        {!! Form::text('kcal', null, ['class' => 'form-control'. ($errors->has('kcal') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la hora aquí. Debe tener formto HH:MM.">
            <i class="bi bi-question-circle" style=" opacity: 0.5;"></i>
        </span> 
        @error('kcal')
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
    {!! Form::label('protein', 'Proteina:', ['class' => 'form-label']) !!}
    <div class="input-group has-validation">
        {!! Form::text('protein', null, ['class' => 'form-control'. ($errors->has('protein') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la hora aquí. Debe tener formto HH:MM.">
            <i class="bi bi-question-circle" style=" opacity: 0.5;"></i>
        </span> 
        @error('protein')
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
    {!! Form::label('carbohydrates', 'Carbohidratos:', ['class' => 'form-label']) !!}
    <div class="input-group has-validation">
        {!! Form::text('carbohydrates', null, ['class' => 'form-control'. ($errors->has('carbohydrates') ? ' is-invalid' : ''), 'id' => 'content', 'required' => 'required']) !!}
        <span class="input-group-text" id="inputGroupPrepend3" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese la hora aquí. Debe tener formto HH:MM.">
            <i class="bi bi-question-circle" style=" opacity: 0.5;"></i>
        </span> 
        @error('carbohydrates')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
        @enderror
        <div class="valid-feedback">
            Looks good!
        </div>
    </div> 
</div>