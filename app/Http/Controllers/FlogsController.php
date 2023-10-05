<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flogs;

class FlogsController extends Controller
{
    public function index()
    {
        $flogs=Flogs::all();
        return view('FlogsIndex', compact('flogs'));
    }

    public function create()
    {
        return view('flogscreate');
    }

    public function store(Request $request)
    {
        $flog = new Flogs();
        $flog -> type = $request -> input('type');
        $flog -> content = $request -> input('content');
        $flog -> patient_id = $request -> input('patient_id');
        $flog -> save();
        return view('FlogsIndex');
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
