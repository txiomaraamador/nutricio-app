@extends('layouts.pdfinicio')
@section('content')

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <h1 class="display-6">Detalles de Comida para {{ $patient->name }}</h1>
        </nav>
        
        <h2>Patient Information</h2>
        <p>Name: {{ $patient->name }}</p>
        <p>Last Name: {{ $patient->lastname }}</p>
        <p>Code: {{ $patient->code }}</p>
        <p>Sex: {{ $patient->sex }}</p>
        <p>Weight: {{ $patient->weight }}</p>
        <p>Height: {{ $patient->height }}</p>
        <p>Age: {{ $patient->age }}</p>

        <h2>Comidas</h2>
        @foreach ($foods as $food)
            <p>{{ $food->type }}, hora: {{ $food->hour }}</p>
            
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
                    @foreach($flogs_foods as $ff)
                        @if ($ff->foods_id === $food->id)
                            @foreach ($flogs as $flog)
                                @if ($flog->id === $ff->flogs_id)
                                    <tr>
                                        <td>{{ $flog->typename->name }}</td>
                                        <td>{{ $flog->aliment }}</td>
                                        <td>{{ $ff->cantidad }} g</td>
                                        <td>{{ $ff->cantidad * $flog->kcal }} kcal</td>
                                        <td>{{ $ff->cantidad * $flog->protein }} g</td>
                                        <td>{{ $ff->cantidad * $flog->carbohydrates }} g</td>
                                    </tr>
                                    <?php
                                        $totalKcal += $ff->cantidad * $flog->kcal;
                                        $totalProtein += $ff->cantidad * $flog->protein;
                                        $totalCarbohydrates += $ff->cantidad * $flog->carbohydrates;
                                    ?>
                                @endif
                            @endforeach
                        @endif
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
        @endforeach
    </div>
@endsection