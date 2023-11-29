<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clienteIndex = Cliente::all();
        return view('cliente/indexCliente', compact ('clienteIndex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user->cliente || $user->isAdmin()) {
            return view('cliente/createCliente');
        } else {
            return redirect('/cliente')->with('error', 'Ya tiene un cliente asociado a su usuario.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|unique:clientes',
            'correo' => 'required|string|email|max:255|unique:clientes',
            'comentario' => 'nullable|string|max:255',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
            'direccion.max' => 'El campo dirección no puede tener más de 255 caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.string' => 'El campo teléfono debe ser una cadena de texto.',
            'telefono.unique' => 'El teléfono ya está en uso.',
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.string' => 'El campo correo debe ser una cadena de texto.',
            'correo.email' => 'El correo electrónico no es válido.',
            'correo.unique' => 'El correo electrónico ya está en uso.',
            'correo.max' => 'El campo correo no puede tener más de 255 caracteres.',
            'comentario.string' => 'El campo comentario debe ser una cadena de texto.',
            'comentario.max' => 'El comentario no puede tener más de 255 caracteres.'
        ]);
        
            $cliente = new Cliente();
            $cliente->nombre = $request->nombre;
            $cliente->telefono = $request->telefono;
            $cliente->correo = $request->correo;
            $cliente->direccion = $request->direccion;
            $cliente->comentario = $request->comentario;
            $cliente->user_id = auth()->id();
            $cliente->save();
    
        return redirect('/cliente')->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id_cliente');
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
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|unique:clientes,telefono,' . $id . ',id_cliente',
            'correo' => 'required|string|email|unique:clientes,correo,' . $id . ',id_cliente',
            'comentario' => 'nullable|string',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
            'direccion.max' => 'El campo dirección no puede tener más de 255 caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.string' => 'El campo teléfono debe ser una cadena de texto.',
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
        
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->comentario = $request->comentario;
        $cliente->user_id = $request->input('original_user_id');
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
