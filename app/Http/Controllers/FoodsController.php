<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Flogs;
use App\Models\Patients;
use App\Models\Categorys;
use App\Models\Flogs_Foods;
use PDF;

class FoodsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Buscar por id_user
            $resultsA = Foods::search($query)->get();

            // Buscar por nombre de usuario en la relación namepatients
            $resultsByNameP = Foods::whereHas('namepatients', function ($namePatientsQuery) use ($query) {
                $namePatientsQuery->where('name', 'iLIKE', '%' . $query . '%');
            })->get();
            
            // Fusionar los resultados de ambas búsquedas
            $results = $resultsA->merge($resultsByNameP);
            //dd($results);

            $foods = Foods::with('namepatients')->get(); // Obtener todos los pacientes para mostrar junto con los resultados de búsqueda
            
            if ($results->isEmpty()) {
                // Si no hay resultados, redirige de nuevo a la vista con un mensaje de error
                return redirect()->route('foods.index')->with('error', 'No se encontraron resultados para la búsqueda: ' . $query);
            } else {
                // Si hay resultados, muestra la vista con los resultados de búsqueda
                return view('foodsindex', compact('foods', 'results'));
            }
            
        } else {
            $foods = Foods::with('namepatients')->get();
            return view('foodsindex', compact('foods'));    
        }
    }

    public function create()
    {
        $patients = Patients::all();
        $flogs = Flogs::all();
        $categoty = Categorys::all();
        return view('foodscreate', compact('patients','flogs','categoty'));
    }

    public function store(Request $request)
    {
      //  try {
            $messages = [
                'type.required' => 'El tipo de comida es obligatorio.',
              //  'type.in' => 'El tipo de comida debe ser "Comida", "Cena", "Desayuno" o "Colacion".',
                'patient_id.required' => 'El ID del paciente es obligatorio.',
                'patient_id.exists' => 'El paciente seleccionado no existe.',
                'date.required' => 'La fecha es obligatoria.',
                'date.date' => 'La fecha debe ser una fecha válida.',
                'hour.required' => 'La hora es obligatoria.',
                'hour.date_format' => 'La hora debe tener el formato H:M.',
            ];
            $this->validate($request, [
                //'type' => 'required|in:Comida,Cena,Desayuno,Colacion',

                'patient_id' => 'required|exists:patients,id',
                'date' => 'required|date',
                'hour' => 'required|date_format:H:i',
            ],$messages);

            $food = new Foods();
            $food -> type = $request -> input('type_name');
            $food -> patient_id = $request -> input('patient_id');
            $food -> date = $request -> input('date');
            $food -> hour = $request -> input('hour');
            $food -> save();
            // Obtener el ID de la nueva instancia de Food
            $foodId = $food->id;

            // Adjuntar Flogs (sustituye [1, 2, 3] con los IDs de Flog que deseas adjuntar)
            $flogIds = $request->input('flogs', []); // Recupera los IDs de los Flogs desde el formulario
            $cantidad = $request->input('cantidad',[]); // Obtener la cantidad desde el formulario
            // Guardar la relación con la cantidad (para cada formulario)
            foreach ($flogIds as $index => $flogId) {
                $cantidadActual = isset($cantidad[$index]) ? $cantidad[$index] : 1; // Valor por defecto si no se proporciona la cantidad
                $food->flogs()->attach([$flogId => ['cantidad' => $cantidadActual]]);
            }
            return redirect("/foods")->with('success', 'Comida agregada con éxito');
       // } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
        //    return redirect("/foods/create")->with('error', 'No se puede agregar la comida. ');
       // }
    }

    public function show($id)
    {
        $food = Foods::find($id);

        // Obtén los registros de flogs_foods para el alimento específico
        $flogs_foods = Flogs_foods::where('foods_id', $food->id)->get();
        //dd($flogs_foods);
        // Obtén los IDs de flogs asociados al alimento
        $flogs_ids = $flogs_foods->pluck('flogs_id')->toArray();
    
        // Obtén los registros de flogs con la relación 'typename' y 'pivot' (cantidad)
        //$flogs = Flogs::with('typename')->whereIn('id', $flogs_ids)->get();
        $flogs = Flogs::with('typename')->whereIn('id', $flogs_ids)->orderBy('id', 'desc')->get();
    
        return view('FoodsShow', compact('food','flogs_foods','flogs'));
    }

    public function showToday($id)
    {
        $food = Foods::find($id);
        // Obtén todos los alimentos del mismo paciente y fecha
        $foods = Foods::where('patient_id', $food->patient_id)
                    ->where('date', $food->date)
                    ->get();

        // Obtén los IDs de los alimentos
        $food_ids = $foods->pluck('id')->toArray();

        // Obtén los registros de flogs_foods para los alimentos específicos
        $flogs_foods = Flogs_foods::whereIn('foods_id', $food_ids)->get();

        // Obtén los IDs de los flogs asociados a los alimentos
        $flogs_ids = $flogs_foods->pluck('flogs_id')->toArray();

        $flogs = Flogs::with(['typename', 'foods' => function ($query) use ($food_ids) {
            $query->whereIn('foods.id', $food_ids); // Agrega la calificación de la columna id
        }])
        ->whereIn('flogs.id', $flogs_ids) // Agrega la calificación de la columna id
        ->orderBy('flogs.id', 'desc') // Agrega la calificación de la columna id
        ->get();

        // Obtén los datos del paciente
        $patient = Patients::find($food->patient_id);

        return view('FoodsShowToday', compact('foods', 'flogs_foods', 'flogs', 'patient'));
    }

    public function edit($id)
    {
        // Aquí debes buscar el cliente por su ID, suponiendo que tienes un modelo llamado "patient"
        $foods = Foods::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('foodsEdit', compact('foods'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
            'type' => 'required|in:Comida,Cena,Desayuno,Colacion',
            
                //'patient_id' => 'required|exists:patients,id',
                'date' => 'required|date',
                'hour' => 'required|date_format:H:i',
        ]);

        // Obtener el cliente a actualizar
        $food = Foods::find($id);

        if (!$food) {
            // Manejar el caso en que el cliente no se encuentra
            return redirect()->route('foods.index')->with('error', 'Comida no encontrado');
        }

        // Actualizar los datos del cliente
        $food->type = $request->input('type');
    
      //  $foods->patient_id = $request->input('patient_id');
        $food -> date = $request -> input('date');
        $food -> hour = $request -> input('hour');


        $food->save();

        return redirect()->route('foods.index', $food->id)->with('success', 'Comida actualizado con éxito');
    }

    public function destroy($id)
    {
        $foods = Foods::find($id);

        if ($foods) {
            try {
                $foods->delete();
                return redirect("/foods")->with('success', 'Comida eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/foods")->with('error', 'No se puede eliminar la comida. Está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/foods")->with('error', 'Comida no encontrado');
        }
    }
    public function showFoods($id)
    {
        $patient = Patients::find($id);

        if (!$patient) {
            return redirect()->route('patients.index')->with('error', 'Paciente no encontrado.');
        }
    
        $foods = Foods::where('patient_id', $id)->get()->groupBy('date');
    
        return view('foodspatients', compact('foods', 'patient'));
    }

    public function generatePdf($id)
        {
            $patient = Patients::find($id);
            $foods = Foods::where('patient_id', $id)->get()->groupBy('date');;
        
            $pdf = PDF::loadView('pdf.listadofoodspatients', compact('foods', 'patient'));
        
            return $pdf->download('historial_comidas.pdf');
        }

    public function Pdf()
        {
            $foods = Foods::with('namepatients')->get();
        
            $pdf = PDF::loadView('pdf.listadofoods', compact('foods'));
        
            return $pdf->download('listado_todas_las_comidas.pdf');
        }

}
