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
        return view('PatientsIndex', compact('patients'));
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
        return view('PatientsIndex');
    }

    public function show($id)
    {
        // Lógica para mostrar un registro específico del modelo en la vista
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un registro específico en la base de datos
    }

    public function destroy($id)
    {
        // Lógica para eliminar un registro específico de la base de datos
    }
}
