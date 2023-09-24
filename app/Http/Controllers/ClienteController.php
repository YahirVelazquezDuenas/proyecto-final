<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente= new Cliente ();

        $clienteIndex = Cliente::all();
        return view('cliente/indexCliente', compact ('clienteIndex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente/createCliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'genero' => 'required|string',
            'telefono' => 'required|numeric',
            'correo' => 'required|email',
            'contraseña' => 'required|string',
            'comentario' => 'required|string',
        ]);
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->genero = $request->genero;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->contraseña = $request->contraseña;
        $cliente->comentario = $request->comentario;
        $cliente->save();
        return redirect('/cliente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
