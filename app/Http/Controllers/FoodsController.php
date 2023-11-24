<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Flogs;
use App\Models\Patients;
use App\Models\Categorys;
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
        try {
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
            $cantidad = $request->input('cantidad'); // Obtener la cantidad desde el formulario

        // Guardar la relación con la cantidad
        $food->flogs()->attach($flogIds, ['cantidad' => $cantidad]);

            return redirect("/foods")->with('success', 'Comida agregada con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/foods/create")->with('error', 'No se puede agregar la comida. ');
        }
    }

    public function show($id)
    {
        /*$flog = Flogs::find($id);

        if ($flog) {
            return view('FlogsShow', compact('flog'));
        } else {
            return redirect()->route('flogs.index')->with('error', 'Comida no encontrado.');
        }*/
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
    
        $foods = Foods::where('patient_id', $id)->get();
    
        return view('foodspatients', compact('foods', 'patient'));
    }

    public function generatePdf($id)
        {
            $patient = Patients::find($id);
            $foods = Foods::where('patient_id', $id)->get();
        
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
