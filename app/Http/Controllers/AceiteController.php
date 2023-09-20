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
        return view('aceite/indexAceite');
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
        return back()->with('success', 'El aceite se ha registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aceite $aceite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aceite $aceite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aceite $aceite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aceite $aceite)
    {
        //
    }
}
