<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patients;

class PatientsController extends Controller
{
    public function index()
    {
        $patients=Patients::all();
        return view('patientsindex', compact('patients'));
    }

    public function create()
    {
        return view('patientscreate');
    }

    public function store(Request $request)
    {
        $patient = new Patients();
        $patient -> name = $request -> input('name');
        $patient -> code = $request -> input('code');
        $patient -> sex = $request -> input('sex');
        $patient -> user_id = $request -> input('user_id');
        $patient -> save();
        return redirect()->route('patients.index');
    }

    public function show($id)
    {
        $patient = Patients::find($id);

        if ($patient) {
            return view('PatientsShow', compact('patient'));
        } else {
            return redirect()->route('patients.index')->with('error', 'Paciente no encontrado.');
        }
    }

    public function edit($id)
    {
        // Aquí debes buscar el cliente por su ID, suponiendo que tienes un modelo llamado "patient"
        $patient = Patients::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el cliente encontrado
        return view('PatientsEdit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
                // Validación de datos
                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required',
                    'sex' => 'required',
                    'user_id' => 'required',
                ]);
        
                // Obtener el cliente a actualizar
                $patient = Patients::find($id);
        
                if (!$patient) {
                    // Manejar el caso en que el cliente no se encuentra
                    return redirect()->route('patients.index')->with('error', 'Paciente no encontrado');
                }
        
                // Actualizar los datos del cliente
                $patient->name = $request->input('name');
                $patient->code = $request->input('code');
                $patient->sex = $request->input('sex');
                $patient->user_id = $request->input('user_id');
        
                $patient->save();
        
                return redirect()->route('patients.show', $patient->id)->with('success', 'Paciente actualizado con éxito');
    }

    public function destroy($id)
    {
        $patient = Patients::find($id);

        if ($patient) {
            $patient->delete();
            return redirect("/patients");
        }
    }
}