<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flogs;
use App\Models\Patients;
use PDF;

class FlogsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Buscar por id_user
            $resultsA = Flogs::search($query)->get();

            $flogs = Flogs::all()->get(); // Obtener todos los pacientes para mostrar junto con los resultados de búsqueda
            
            if ($results->isEmpty()) {
                // Si no hay resultados, redirige de nuevo a la vista con un mensaje de error
                return redirect()->route('flogs.index')->with('error', 'No se encontraron resultados para la búsqueda: ' . $query);
            } else {
                // Si hay resultados, muestra la vista con los resultados de búsqueda
                return view('flogsindex', compact('flogs', 'results'));
            }
            
        } else {
            $flogs = Flogs::all();
            return view('flogsindex', compact('flogs'));    
        }
    }

    public function create()
    {
        return view('flogscreate');
    }

    public function store(Request $request)
    {
        try {
            $messages = [
               
            ];
            $this->validate($request, [
            
               
            ],$messages);

            $flog = new Flogs();
            $flog -> type = $request -> input('type');
            $flog -> aliment = $request -> input('aliment');
            $flog -> kcal = $request -> input('kcal');
            $flog -> protein = $request -> input('protein');
            $flog -> carbohydrates = $request -> input('carbohydrates');
            $flog -> save();

            return redirect("/flogs")->with('success', 'Comida agregada con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/flogs/create")->with('error', 'No se puede agregar la comida. ');
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
        $flog = Flogs::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('FlogsEdit', compact('flog'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $this->validate($request, [
           // 'type' => 'required|in:Comida,Cena,Desayuno,Colacion',
               
        ]);

        // Obtener el cliente a actualizar
        $flog = Flogs::find($id);

        if (!$flog) {
            // Manejar el caso en que el cliente no se encuentra
            return redirect()->route('flogs.index')->with('error', 'Comida no encontrado');
        }

        $flog -> type = $request -> input('type');
        $flog -> aliment = $request -> input('aliment');
        $flog -> kcal = $request -> input('kcal');
        $flog -> protein = $request -> input('protein');
        $flog -> carbohydratos = $request -> input('carbohydratos');


        $flog->save();

        return redirect()->route('flogs.index', $flog->id)->with('success', 'Comida actualizado con éxito');
    }

    public function destroy($id)
    {
        $flog = Flogs::find($id);

        if ($flog) {
            try {
                $flog->delete();
                return redirect("/flogs")->with('success', 'Comida eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/flogs")->with('error', 'No se puede eliminar la comida. Está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/flogs")->with('error', 'Comida no encontrado');
        }
    }

    public function generatePdf($id)
        {
            $flogs = Flogs::where('patient_id', $id)->get();
        
            $pdf = PDF::loadView('pdf.listadoflogspatients', compact('flogs', 'patient'));
        
            return $pdf->download('historial_comidas.pdf');
        }

    public function Pdf()
        {
            $flogs = Flogs::with('namepatients')->get();
        
            $pdf = PDF::loadView('pdf.listadoflogs', compact('flogs'));
        
            return $pdf->download('listado_todas_las_comidas.pdf');
        }
    
        public function getAliments($id)
        {
          // Utiliza el método find para obtener el modelo correspondiente
        $flog = Flogs::find($id);
        $flogId = $flog->type;
        //dd($flogId);
        // Verifica si se encontró el modelo antes de continuar
        if ($flog) {
            // Obtén los alimentos para el ID específico
            $aliments = Flogs::select('id', 'aliment')->where('type', $flogId)->get();
            return response()->json($aliments);
        } else {
            // Maneja el caso en que no se encuentre el modelo con el ID proporcionado
            // Puedes lanzar una excepción, devolver un mensaje de error, o tomar otra acción según tus necesidades.
            dd("No se encontró el modelo con ID: {$id->id}");
        }
    }
    public function getValores($id)
    {
        // Utiliza el método find para obtener el modelo correspondiente
        $flog = Flogs::find($id);
        $flogaliment = $flog->aliment;
        //dd($flogaliment);
        // Verifica si se encontró el modelo antes de continuar
        if ($flog) {
            // Obtén los valores específicos de kcal, protein y carbohydrates para el alimento
            $alimentData = Flogs::select('kcal', 'protein', 'carbohydrates')
                ->where('aliment', $flogaliment)
                ->first();
                //dd($alimentData);
            if ($alimentData) {
                return response()->json($alimentData);
            } else {
                // Maneja el caso en que no se encuentre el alimento con el nombre proporcionado
                dd("No se encontró el alimento con el nombre: {$flog->aliment}");
            }
        } else {
            // Maneja el caso en que no se encuentre el modelo con el ID proporcionado
            dd("No se encontró el modelo con ID: {$id->id}");
        }
    }

}


