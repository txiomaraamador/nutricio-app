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
        return view('flogsindex', compact('flogs'));
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
        return view('flogsindex');
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
            'patient_id' => 'required',
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
        $flog->patient_id = $request->input('patient_id');


        $flog->save();

        return redirect()->route('flogs.index', $flog->id)->with('success', 'Comida actualizado con éxito');
    }

    public function destroy($id)
    {
        $flog = Flogs::find($id);

        if ($flog) {
            $flog->delete();
            return redirect("/flogs");
        }
    }
}
