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
                $(document).ready(function () {
                    function handleTypeChange(select) {
                        var selectedType = select.val();
            
                        $.ajax({
                            url: '/getAliments/' + selectedType,
                            type: 'GET',
                            success: function (data) {
                                var selectAliment = select.closest('tr').find('select[name="flogs[]"]');
                                selectAliment.empty();
            
                                // Agregar una opción predeterminada
                                selectAliment.append('<option value="">Seleccione una opcion</option>');

                                $.each(data, function (index, item) {
                                    selectAliment.append('<option value="' + item.id + '">' + item.aliment + '</option>');
                                });
            
                                // Nueva llamada AJAX para obtener valores y actualizar etiquetas
                                handleAlimentChange(selectAliment);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }
            
                    function handleAlimentChange(select) {
                        var selectedAliment = select.val();
            
                        $.ajax({
                            url: '/getValores/' + selectedAliment,
                            type: 'GET',
                            success: function (values) {
                                var row = select.closest('tr');
                                row.find('label[for="kcal"]').text(values.kcal);
                                row.find('label[for="protein"]').text(values.protein);
                                row.find('label[for="carbohydrates"]').text(values.carbohydrates);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }
            
                    $('#formFlogsContainer').on('change', 'select[name="type"]', function () {
                        handleTypeChange($(this));
                    });
            
                    $('#formFlogsContainer').on('change', 'select[name="flogs[]"]', function () {
                        handleAlimentChange($(this));
                    });

                    // Nueva función para realizar la suma y actualización
                    function updateTotal(row) {
                        
                                var cantidad = parseFloat(row.find('input[name="cantidad[]"]').val()) || 0;
                                var kcal = parseFloat(row.find('label[for="kcal"]').text()) || 0;
                                var protein = parseFloat(row.find('label[for="protein"]').text()) || 0;
                                var carbohydrates = parseFloat(row.find('label[for="carbohydrates"]').text()) || 0;
                                
                                var totalKcal = 00;
                                var totalProtein = 00;
                                var totalCarbohydrates = 00;

                                 totalKcal = cantidad * kcal;
                                 totalProtein = cantidad * protein;
                                 totalCarbohydrates = cantidad * carbohydrates;

                                // Actualiza los elementos correspondientes con los nuevos valores
                                row.find('label[for="kcal"]').text(totalKcal.toFixed(2));
                                row.find('label[for="protein"]').text(totalProtein.toFixed(2));
                                row.find('label[for="carbohydrates"]').text(totalCarbohydrates.toFixed(2));
                            }

                            // Asocia la nueva función al evento 'input' del campo de cantidad
                            $('#formFlogsContainer').on('change', 'input[name="cantidad[]"]', function () {
                                var row = $(this).closest('tr');
                                updateTotal(row);
                            });
            
                    function addFormFlogs() {
                        var clonedFormFlogs = $('.clonable-form').first().clone();
                        var uniqueId = Date.now();
                        clonedFormFlogs.find('[id]').each(function () {
                            $(this).attr('id', $(this).attr('id') + uniqueId);
                        });

                        // Restablecer los valores en el nuevo formulario
                        clonedFormFlogs.find('select[name="type"]').val('');
                        clonedFormFlogs.find('select[name="flogs[]"]').val('');
                        clonedFormFlogs.find('input[name="cantidad[]"]').val(null);
                        clonedFormFlogs.find('label[for="kcal"]').text('0.0');
                        clonedFormFlogs.find('label[for="protein"]').text('0.0');
                        clonedFormFlogs.find('label[for="carbohydrates"]').text('0.0');
            
                        clonedFormFlogs.find('.remove-form').click(function () {
                            $(this).closest('table').remove();
                        });
            
                        $('#formFlogsContainer').append(clonedFormFlogs);
                        clonedFormFlogs.find('select[name="type"]').trigger('change');
                    }
            
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