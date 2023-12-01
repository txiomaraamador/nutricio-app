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
        // Buscar por id_user
        $results = Patients::search($query)->get();

        // Buscar por nombre de usuario
        $resultsByName = Patients::whereHas('nameuser', function ($nameUserQuery) use ($query) {
            $nameUserQuery->where('name', 'iLIKE', '%' . $query . '%');
        })->get();

        // Fusionar los resultados de ambas búsquedas
        $results = $results->merge($resultsByName);

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

        return view('PatientsCreate', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no debe tener más de :max caracteres.',
                'code.required' => 'El código es obligatorio.',
                'code.max' => 'El código no debe tener más de :max caracteres.',
                'sex.required' => 'El sexo es obligatorio.',
                'sex.in' => 'El sexo debe ser "mujer" o "hombre".',
                'user_id.required' => 'El usuario es obligatorio.',
                'user_id.exists' => 'El usuario seleccionado no existe.',
                'lastname.required' => 'El apellido es obligatorio.',
                'lastname.max' => 'El apellido no debe tener más de :max caracteres.',
                'weight.required' => 'El peso es obligatorio.',
                'weight.numeric' => 'El peso debe ser un valor numérico.',
                'weight.min' => 'El peso no debe ser menor que :min.',
                'height.required' => 'La altura es obligatoria.',
                'height.numeric' => 'La altura debe ser un valor numérico.',
                'height.min' => 'La altura no debe ser menor que :min.',
                'age.required' => 'La edad es obligatoria.',
                'age.integer' => 'La edad debe ser un valor entero.',
                'age.min' => 'La edad no debe ser menor que :min.',
                'date_of_birth.required' => 'La fecha de nacimiento es obligatoria.',
                'date_of_birth.date' => 'La fecha de nacimiento debe ser una fecha válida.',
                'avatar.required' => 'El avatar es obligatorio.',
            ];
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
                'avatar' => 'nullable|image|mimes:jpeg,jpg,gif,svg|max:1048',
            ], $messages);
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
            if ($request->hasFile('avatar')) {
                $imageName = time() . '.' . $request->avatar->extension();
                $request->avatar->move(public_path('avatars'), $imageName);
                $patient->avatar = $imageName;
            }
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
                    'avatar' => 'nullable|image|mimes:jpeg,jpg,gif,svg|max:1048',
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
                        // Manejo de la imagen (si se proporciona)
                if ($request->hasFile('avatar')) {
                    // Eliminar la imagen anterior si existe
                    if ($patient->avatar) {
                        $imagePath = public_path('avatars/') . $patient->avatar;
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }

                    $imageName = time() . '.' . $request->avatar->extension();
                    $request->avatar->move(public_path('avatars'), $imageName);

                    $patient->avatar = $imageName; // Guardar el nombre de la nueva imagen en el modelo
                }
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

            // Borra la imagen asociada al cliente si existe
            $imagePath = public_path('avatars/' . $patient->avatar); // Ruta a la imagen en el sistema de archivos
            if (file_exists($imagePath)) {
                unlink($imagePath); // Elimina la imagen
            }
            
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
    public function Pdfs()
    {
        
        $patients = Patients::with('nameuser')->get();
        
        try {
            $pdf = PDF::loadView('pdf.listadopatients', compact('patients'));
            return $pdf->download('lista_de_pacientes.pdf');
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
}

