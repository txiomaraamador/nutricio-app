@extends('layouts.app')

@section('title', 'Flog Create')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
            <hr style="color: #000000;" />
            <div class="row">
                <div class="col-md-6">
                    <h2>Agregar alimentos</h2>
                </div>
                <div class="col-md-6">
                    <button type="button" id="addFormFlogs" class="btn btn-success float-end"><i class="bi bi-plus-circle"></i></button>
                </div>
            </div>       

            <div id="formFlogsContainer">
                <div class="clonable-form">
                    @include('FormFlogsFoods')
                    
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Agrega un nuevo FormFlogs
                    function addFormFlogs() {
                        var clonedFormFlogs = $('.clonable-form').first().clone();
                        var uniqueId = Date.now();
                        clonedFormFlogs.find('[id]').each(function() {
                            $(this).attr('id', $(this).attr('id') + uniqueId);
                        });
                        clonedFormFlogs.find('.remove-form').click(function() {
                            // Elimina el FormFlogs clonado al hacer clic en el botón de eliminación
                            $(this).closest('table').remove();
                        });
                        $('#formFlogsContainer').append(clonedFormFlogs);
                    }
        
                    // Agrega un nuevo FormFlogs al cargar la página
                    addFormFlogs();
        
                    $('#addFormFlogs').click(addFormFlogs);
                });
            </script>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/foods" class="btn btn-success">Cancelar</a>
        </form>
        
        {!! Form::close() !!}
        
    </div>
    <hr style="color: #000000;" />
    
@endsection