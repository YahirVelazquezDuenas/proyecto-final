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
        $usuariounique = Cliente::where('usuario', $request->usuario)->first();
        if ($usuariounique) {
            return redirect()->back()->with('error', 'El nombre de usuario ya está registrado. Por favor, intenta con un nombre diferente.');
        }
        $passwordunique = Cliente::where('contraseña', $request->contraseña)->first();
        if ($passwordunique) {
            return redirect()->back()->with('error', 'La contraseña ya está registrada. Por favor, intenta con una diferente.');
        }
        $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'usuario' => 'required|string',
            'telefono' => 'required|string',
            'correo' => 'required|email',
            'contraseña' => 'required|string',
            'comentario' => 'nullable|string',
        ]);
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->usuario = $request->usuario;
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
    public function show(Request $request)
    {
        $id = $request->input('id');
        $cliente = Cliente::find($id);
            
        if (!$cliente) {
            return redirect()->back()->with('error', 'El cliente no se encontró.');
        }
        return view('/cliente/showCliente', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('cliente.index')->with('error', 'El cliente no se encontró.');
        }

        return view('/cliente/editCliente', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuariounique = Cliente::where('usuario', $request->usuario)->first();
        if ($usuariounique) {
            return redirect()->back()->with('error', 'El nombre de usuario ya está registrado. Por favor, intenta con un nombre diferente.');
        }
        $passwordunique = Cliente::where('contraseña', $request->contraseña)->first();
        if ($passwordunique) {
            return redirect()->back()->with('error', 'La contraseña ya está registrada. Por favor, intenta con una diferente.');
        }
        $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'usuario' => 'required|string',
            'telefono' => 'required|string',
            'correo' => 'required|email',
            'contraseña' => 'required|string',
            'comentario' => 'string',
        ]);
    
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return redirect()->route('cliente.index')->with('error', 'El cliente no se encontró.');
        }
                
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->usuario = $request->usuario;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->contraseña = $request->contraseña;
        $cliente->comentario = $request->comentario;
        $cliente->save();

        return redirect()->route('cliente.index')->with('success', 'El cliente se ha actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('cliente.index')->with('error', 'El cliente no se encontró.');
        }

        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'El cliente se ha eliminado con éxito.');
    }
}
