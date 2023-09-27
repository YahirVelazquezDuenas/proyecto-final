<?php

namespace App\Http\Controllers;

use App\Models\Aceite;
use Illuminate\Http\Request;

class AceiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aceite= new Aceite ();

        $aceiteIndex = Aceite::all();
        return view('aceite/indexAceite', compact ('aceiteIndex'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aceite/createAceite');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'tipo' => 'required|string',
            'cantidad' => 'required|numeric',
            'marca' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        $aceite = new Aceite();
        $aceite->nombre = $request->nombre;
        $aceite->tipo = $request->tipo;
        $aceite->cantidad = $request->cantidad;
        $aceite->marca = $request->marca;
        $aceite->descripcion = $request->descripcion;
        $aceite->save();
        return redirect('/aceite');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');
        $aceite = Aceite::find($id);
            
        if (!$aceite) {
            return redirect()->back()->with('error', 'El aceite no se encontró.');
        }
        return view('/aceite/showAceite', ['aceite' => $aceite]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aceite = Aceite::find($id);

        if (!$aceite) {
            return redirect()->route('aceite.index')->with('error', 'El aceite no se encontró.');
        }

        return view('/aceite/editAceite', ['aceite' => $aceite]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'tipo' => 'required|string',
            'cantidad' => 'required|numeric',
            'marca' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        $aceite = Aceite::find($id);
    
        if (!$aceite) {
            return redirect()->route('aceite.index')->with('error', 'El aceite no se encontró.');
        }
        $aceite->nombre = $request->nombre;
        $aceite->tipo = $request->tipo;
        $aceite->cantidad = $request->cantidad;
        $aceite->marca = $request->marca;
        $aceite->descripcion = $request->descripcion;
        $aceite->save();
        return redirect()->route('aceite.index')->with('success', 'El aceite se ha actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aceite = Aceite::find($id);

        if (!$aceite) {
            return redirect()->route('aceite.index')->with('error', 'El aceite no se encontró.');
        }

        $aceite->delete();

        return redirect()->route('aceite.index')->with('success', 'El aceite se ha eliminado con éxito.');
    }
}
