<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patients;
use App\Models\Flogs; 
use App\Models\User; 
use PDF;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        if ($query) {
            $results = Patients::search($query)->get();
            $patients = Patients::with('nameuser')->get(); // Obtener todos los pacientes para mostrar junto con los resultados de búsqueda
            
            if ($results->isEmpty()) {
                // Si no hay resultados, redirige de nuevo a la vista con un mensaje de error
                return redirect()->route('patients.index')->with('error', 'No se encontraron resultados para la búsqueda: ' . $query);
            } else {
                // Si hay resultados, muestra la vista con los resultados de búsqueda
                return view('patientsindex', compact('patients', 'results'));
            }
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
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:8',
                'sex' => 'required|in:mujer,hombre', 
                'user_id' => 'required|exists:users,id', // Verifica que el 'user_id' exista en la tabla de usuarios
                'lastname' => 'required|string|max:255',
                'weight' => 'required|numeric|min:0',
                'height' => 'required|numeric|min:0',
                'age' => 'required|integer|min:0',
                'date_of_birth' => 'required|date',
            ]);

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
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/patients/create")->with('error', 'No se puede agregar al paciente.');
        }
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
                    'name' => 'required|string|max:255',
                    'code' => 'required|string|max:20',
                    'sex' => 'required|in:mujer,hombre', 
                    //'user_id' => 'required|exists:users,id', // Verifica que el 'user_id' exista en la tabla de usuarios
                    'lastname' => 'required|string|max:255',
                    'weight' => 'required|numeric|min:0',
                    'height' => 'required|numeric|min:0',
                    'age' => 'required|integer|min:0',
                    'date_of_birth' => 'required|date',
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
            $patientName = $patient->name;
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
    public function Pdf()
    {
        $patients = Patients::with('nameuser')->get();
        
        $pdf = PDF::loadView('pdf.listadopatients', compact('patients'));
        
        return $pdf->download('lista_de_pacientes.pdf');
    }
}

