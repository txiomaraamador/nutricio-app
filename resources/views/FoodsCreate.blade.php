@extends('layouts.app')

@section('title', 'Flog Create')
@section('content')

    <div class="container mt-5">
        <h1 class="display-6">Agregar Comida</h1>
        <hr style="color: #000000;" />

        @if(session('error'))
            <div id="alert" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div id="alert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <script>
            // Código JavaScript para ocultar la alerta después de unos segundos
            setTimeout(function(){
                var alert = document.getElementById('alert');
                if(alert) {
                    alert.style.display = 'none';
                }
            }, 3000); // La alerta se ocultará después de 5 segundos (5000 milisegundos)
        </script>

        {!! Form::open(['url' => '/foods', 'method' => 'POST', 'class' => 'row g-3 needs-validation']) !!}
            {!! csrf_field() !!}
            <div class="col-md-6">
                {!! Form::label('patient_id', 'Paciente:', ['class' => 'form-label']) !!}
                {!! Form::select('patient_id', $patients->pluck('name', 'id'), null, ['class' => 'form-select', 'required' => 'required', 'placeholder' => 'Elige el paciente']) !!}
            </div>
            @include('FormFoodsDatos')
            <div class="d-grid gap-2">
                {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                <a href="/foods" class="btn btn-success">Cancelar</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection