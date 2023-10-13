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
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255|unique:clientes',
            'telefono' => 'required|string|regex:/^(\+\d{1,3})?[- .]?\(?(\d{3})\)?[- .]?(\d{3})[- .]?(\d{4})$/|unique:clientes',
            'correo' => 'required|string|email|unique:clientes',
            'comentario' => 'nullable|string',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
            'direccion.max' => 'El campo dirección no puede tener más de 255 caracteres.',
            'direccion.unique' => 'La dirección ya está en uso.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.string' => 'El campo teléfono debe ser una cadena de texto.',
            'telefono.regex' => 'El campo teléfono debe tener un formato +55 123 456 7890.',
            'telefono.unique' => 'El teléfono ya está en uso.',
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.string' => 'El campo correo debe ser una cadena de texto.',
            'correo.email' => 'El correo electrónico no es válido.',
            'correo.unique' => 'El correo electrónico ya está en uso.',
            'comentario.string' => 'El campo comentario debe ser una cadena de texto.',
        ]);
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->comentario = $request->comentario;
        $cliente->save();
    
        return redirect('/cliente')->with('success', 'Cliente registrado correctamente.');
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255|unique:clientes',
            'telefono' => 'required|string|regex:/^(\+\d{1,3})?[- .]?\(?(\d{3})\)?[- .]?(\d{3})[- .]?(\d{4})$/|unique:clientes',
            'correo' => 'required|string|email|unique:clientes',
            'comentario' => 'nullable|string',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
            'direccion.max' => 'El campo dirección no puede tener más de 255 caracteres.',
            'direccion.unique' => 'La dirección ya está en uso.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.string' => 'El campo teléfono debe ser una cadena de texto.',
            'telefono.regex' => 'El campo teléfono debe tener un formato +55 1 55 1234 5678.',
            'telefono.unique' => 'El teléfono ya está en uso.',
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.string' => 'El campo correo debe ser una cadena de texto.',
            'correo.email' => 'El correo electrónico no es válido.',
            'correo.unique' => 'El correo electrónico ya está en uso.',
            'comentario.string' => 'El campo comentario debe ser una cadena de texto.',
        ]);
    
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return redirect()->route('cliente.index')->with('error', 'El cliente no se encontró.');
        }
                
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
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
