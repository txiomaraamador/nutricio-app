<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patients;
use App\Models\Flogs; 
use App\Models\User; 

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        if ($query) {
            $results = Patients::search($query)->get();
            $patients = Patients::with('nameuser')->get(); // Obtener todos los pacientes para mostrar junto con los resultados de búsqueda
            return view('patientsindex', compact('patients', 'results'));
        } else {
            $patients = Patients::with('nameuser')->get();
            return view('patientsindex', compact('patients'));
        }
    }

    public function create()
    {
        $users = User::all(); // Obtener todos los usuarios

        return view('patientscreate', compact('users'));
    }

    public function store(Request $request)
    {
      //  try {
            // Crear un nuevo paciente
            $patient = new Patients();
            $patient->name = $request->input('name');
            $patient->code = $request->input('code');
            $patient->sex = $request->input('sex');
            $patient->user_id = $request->input('user_id');
            $patient->lastname = $request->input('lastname');
            $patient->weight = $request->input('weight');
            $patient->height = $request->input('height');
            $patient->age = $request->input('age');
            $patient->date_of_birth = $request->input('date_of_birth');
            $patient->save();
    
            return redirect("/patients")->with('success', 'Paciente creado con éxito');
      //  } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
          //  return redirect("/patients/create")->with('error', 'No se puede agregar al paciente. El Nutriologo no existe.');
      //  }
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
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required',
                    'sex' => 'required',
                    //'user_id' => 'required',
                    'lastname'=> 'required',
                    'weight'=> 'required',
                    'height'=> 'required',
                    'age'=> 'required',
                    'date_of_birth'=> 'required',
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
                //$patient->user_id = $request->input('user_id');
                $patient->lastname = $request->input('lastname');
                $patient->weight = $request->input('weight');
                $patient->height = $request->input('height');
                $patient->age = $request->input('age');
                $patient->date_of_birth = $request->input('date_of_birth');
        
                $patient->save();
        
                return redirect()->route('patients.show', $patient->id)->with('success', 'Paciente actualizado con éxito');
    }

    public function destroy($id)
    {
        $patient = Patients::find($id);

        if ($patient) {
            $patient->refresh();
            $patientName = $patient->nombre;
            try {
                $patient->delete();
                return redirect("/patients")->with('success', 'El paciente '.$patientName.' ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/patients")->with('error', 'No se puede eliminar el paciente '.$patientName.'. Está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/patients")->with('error', 'Paciente no encontrado');
        }
    }
 /*   public function search (){
        $query = ''; // <-- Change the query for testing.

        $patients = App\Patients::search($query)->get();

        return $patients;
    }*/
}
