<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
   
    public function index()
    {
        //
        $datos = Personas::orderBy('paterno', 'desc')->paginate(2);
        return view('inicio', compact('datos'));

    }

    
    public function create()
    {
        //
        return view('agregar');
    }

    
    public function store(Request $request)
    {
        //
        $personas = new Personas();
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Agregado con exito!");
    }

    
    public function show($id)
    {
        //
        $personas = Personas::find($id);
        return view("eliminar", compact('personas'));
    }

    
    public function edit($id)
    {
        //
        $personas = Personas::find($id);
        return view("actualizar", compact('personas'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $personas = Personas::find($id);
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Actualizado con exito!");

    }

    
    public function destroy($id)
    {
        //
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success", "Eliminado con exito!");
    }
}
