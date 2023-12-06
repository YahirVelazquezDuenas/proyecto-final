<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cliente = $user->cliente;
        if ($user->isAdmin()) {
            $clienteIndex = Cliente::all();
        } else if(!$user->isAdmin() and $cliente){
            $clienteIndex = Cliente::where('id_cliente', $user->cliente->id_cliente)->get();
        }else{
            $clienteIndex = collect();
        }

        return view('cliente/indexCliente', compact('clienteIndex'));
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
        $user = auth()->user();
        if($user->isAdmin()){
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
        }else{
            $request->validate([
                'direccion' => 'required|string|max:255',
                'telefono' => 'required|string|unique:clientes',
                'comentario' => 'nullable|string|max:255',
            ], [
                'direccion.required' => 'El campo dirección es obligatorio.',
                'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
                'direccion.max' => 'El campo dirección no puede tener más de 255 caracteres.',
                'telefono.required' => 'El campo teléfono es obligatorio.',
                'telefono.string' => 'El campo teléfono debe ser una cadena de texto.',
                'telefono.unique' => 'El teléfono ya está en uso.',
                'comentario.string' => 'El campo comentario debe ser una cadena de texto.',
                'comentario.max' => 'El comentario no puede tener más de 255 caracteres.'
            ]);
        }
            $cliente = new Cliente();
            if($user->isAdmin())
            {
                $cliente->nombre = $request->nombre;
                $cliente->correo = $request->correo;
            }
            else{
                $cliente->nombre = $user->name;
                $cliente->correo = $user->email;
            }
            
            $cliente->telefono = $request->telefono;
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
        $user = Auth::user();

        if ($user->isAdmin()) {
            $cliente = Cliente::find($id);
        } else {
            $cliente = $user->cliente()->find($id);
        }

        if (!$cliente) {
            return redirect()->back()->with('error', 'El cliente no se encontró o no está asociado a tu cuenta.');
        }

        return view('/cliente/showCliente', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        $user = Auth::user();

        if ($user->isAdmin() || ($cliente && $cliente->user_id === $user->id)) {
            return view('/cliente/editCliente', ['cliente' => $cliente]);
        } else {
            return redirect()->route('cliente.index')->with('error', 'No tienes permisos para editar este cliente.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return redirect()->route('cliente.index')->with('error', 'El cliente no se encontró.');
        }
        $user = auth()->user();
        if($user->isAdmin()){
            $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|unique:clientes,telefono,' . $id . ',id_cliente',
            'correo' => 'required|string|email|max:255|unique:clientes,correo,' . $id . ',id_cliente',
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
        }else{
            $request->validate([
                'direccion' => 'required|string|max:255',
                'telefono' => 'required|string|unique:clientes,telefono,' . $id . ',id_cliente',
                'comentario' => 'nullable|string|max:255',
            ], [
                'direccion.required' => 'El campo dirección es obligatorio.',
                'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
                'direccion.max' => 'El campo dirección no puede tener más de 255 caracteres.',
                'telefono.required' => 'El campo teléfono es obligatorio.',
                'telefono.string' => 'El campo teléfono debe ser una cadena de texto.',
                'telefono.unique' => 'El teléfono ya está en uso.',
                'comentario.string' => 'El campo comentario debe ser una cadena de texto.',
                'comentario.max' => 'El comentario no puede tener más de 255 caracteres.'
            ]);
        }

        if($user->isAdmin())
        {
            $cliente->nombre = $request->nombre;
            $cliente->correo = $request->correo;
            
        }
        else{
            $cliente->nombre = $user->name;
            $cliente->correo = $user->email;

        }
        $cliente->user_id = $cliente->user_id;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->comentario = $request->comentario;
        //$cliente->user_id = $request->input('original_user_id');
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

        $compras = Compras::where('id_cliente', $id)->get();

        foreach ($compras as $compra) {
            $compra->delete(); 
        }

        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'El cliente se ha eliminado con éxito.');
    }
}
