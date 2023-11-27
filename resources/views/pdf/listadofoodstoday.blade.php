@extends('layouts.pdfinicio')
@section('content')

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <h2 class="display-6">Reporte diario de valores nutrimentales</h2>
        </nav>
        <hr style="color: #000000;" />

        <h3>Información de paciente</h3>
        <p>Nombre: {{ $patient->name }} {{ $patient->lastname }}</p>
        <p>Code: {{ $patient->code }}</p>
        <p>Sexo: {{ $patient->sex }}, Edad: {{ $patient->age }} años</p>
        <p>Peso: {{ $patient->weight }} kg, Altura: {{ $patient->height }} mts</p>
        <hr style="color: #000000;" />

        <h3>Comidas a ingerir en un día</h3>
        <?php
            $grandTotalKcal = 0;
            $grandTotalProtein = 0;
            $grandTotalCarbohydrates = 0;
        ?>
        @foreach ($foods as $food)
            <p>{{ $food->type }}, hora: {{ $food->hour }}, {{ $food->date }}</p>
            
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
                        <td>Total</td>
                        <td>{{ $totalKcal }} kcal</td>
                        <td>{{ $totalProtein }} g</td>
                        <td>{{ $totalCarbohydrates }} g</td>
                    </tr>
                    <?php
                        $grandTotalKcal += $totalKcal;
                        $grandTotalProtein += $totalProtein;
                        $grandTotalCarbohydrates += $totalCarbohydrates;
                    ?>
                </tbody> 
            </table>

        @endforeach
        <hr style="color: #000000;" />

        <div>
            <h4>Total de valor nutrimental por día: </h4>
            <p>Kcal: {{ $grandTotalKcal }} kcal, Proteina: {{ $grandTotalProtein }} g, Carbohidratos: {{ $grandTotalCarbohydrates }} g</p>
        </div>
    </div>
@endsection