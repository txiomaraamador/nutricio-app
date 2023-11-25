@extends('layouts.app')

@section('title', 'Foods Show')

@section('content')
    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <h1 class="display-6">Detalles de Comida para {{ $food->namepatients->name }}</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/foods" class="btn btn-outline-success mt-3">Regresar</a>
            </div>
        </nav>
        <hr style="color: #000000;" />

                <p>Tipo de Alimento: {{ $food->type }}</p>
                <p>Fecha: {{ $food->date }}</p>
                <p>Hora: {{ $food->hour }}
                    <hr style="color: #000000;" />
                <h3>Información de Alimentos</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Alimento</th>
                            <th>Cantidad</th>
                            <th>Kcal</th>
                            <th>Proteínas</th>
                            <th>Carbohidratos</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            $totalKcal = 0;
                            $totalProtein = 0;
                            $totalCarbohydrates = 0;
                        ?>
                        @foreach($flogs as $index => $flog)
                            <tr>
                                <td>{{ $flog->typename->name }}</td>
                                <td>{{ $flog->aliment }}</td>
                                <td>{{ $flogs_foods[$index]->cantidad }} g</td>
                                <td>{{ $flogs_foods[$index]->cantidad * $flog->kcal }} kcal</td>
                                <td>{{ $flogs_foods[$index]->cantidad * $flog->protein }} g</td>
                                <td>{{ $flogs_foods[$index]->cantidad * $flog->carbohydrates }} g</td>
                            </tr>
                            <?php
                                $totalKcal += $flogs_foods[$index]->cantidad * $flog->kcal;
                                $totalProtein += $flogs_foods[$index]->cantidad * $flog->protein;
                                $totalCarbohydrates += $flogs_foods[$index]->cantidad * $flog->carbohydrates;
                            ?>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total por comida completa</td>
                            <td>{{ $totalKcal }} kcal</td>
                            <td>{{ $totalProtein }} g</td>
                            <td>{{ $totalCarbohydrates }} g</td>
                        </tr>
                    </tbody> 
                </table>

        <script>
            @if(session('success'))
                alert("{{ session('success') }}");
            @elseif(session('error'))
                alert("{{ session('error') }}");
            @endif
        </script>
    </div>
@endsection
