<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flogs;
use App\Models\Patients;
use PDF;

class FlogsController extends Controller
{
    public function index()
    {
        $flogs = Flogs::with('namepatients')->get();
        return view('flogsindex', compact('flogs'));
    }

    public function create()
    {
        $patients = Patients::all();
        return view('flogscreate', compact('patients'));
    }

    public function store(Request $request)
    {
        try {
            $flog = new Flogs();
            $flog -> type = $request -> input('type');
            $flog -> content = $request -> input('content');
            $flog -> patient_id = $request -> input('patient_id');
            $flog -> date = $request -> input('date');
            $flog -> hour = $request -> input('hour');
            $flog -> save();
            return redirect("/flogs")->with('success', 'Paciente creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/flogs/create")->with('error', 'No se puede agregar la comida. El Paciene no existe.');
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
            'type' => 'required',
            'content' => 'required',
           // 'patient_id' => 'required',
            'date' => 'required',
            'hour'  => 'required',
        ]);

        // Obtener el cliente a actualizar
        $flog = Flogs::find($id);

        if (!$flog) {
            // Manejar el caso en que el cliente no se encuentra
            return redirect()->route('flogs.index')->with('error', 'Comida no encontrado');
        }

        // Actualizar los datos del cliente
        $flog->type = $request->input('type');
        $flog->content = $request->input('content');
      //  $flog->patient_id = $request->input('patient_id');
        $flog -> date = $request -> input('date');
        $flog -> hour = $request -> input('hour');


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
    public function showFlogs($id)
    {
        $patient = Patients::find($id);

        if (!$patient) {
            return redirect()->route('patients.index')->with('error', 'Paciente no encontrado.');
        }
    
        $flogs = Flogs::where('patient_id', $id)->get();
    
        return view('flogspatients', compact('flogs', 'patient'));
    }

    public function generatePdf($id)
        {
            $patient = Patients::find($id);
            $flogs = Flogs::where('patient_id', $id)->get();
        
            $pdf = PDF::loadView('pdf.listadoflogspatients', compact('flogs', 'patient'));
        
            return $pdf->download('historial_comidas.pdf');
        }
    }

