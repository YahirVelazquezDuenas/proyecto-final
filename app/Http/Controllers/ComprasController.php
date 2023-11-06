<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Aceite;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\DetalleCompra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras= new Compras ();

        $comprasIndex = Compras::all();
        $detalleIndex = DetalleCompra::all();

        return view('compras/indexCompras', compact ('comprasIndex', 'detalleIndex'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aceites = Aceite::all();
        $clientes = Cliente::all();
        return view('compras/createCompras',compact('aceites','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'metodo' => 'required|string',
            'aceites' => 'required|array',
            'cantidad' => 'required|array',
            'cantidad.*' => 'required|integer|min:1|max:999999',
            'aceites.*' => 'required|integer|exists:aceites,id_aceite',
            'id_cliente' => 'required|integer|exists:clientes,id_cliente'
        ], [
            'fecha.required' => 'El campo de fecha es obligatorio.',
            'fecha.date' => 'El campo de fecha debe ser una fecha válida.',
            'metodo.required' => 'El campo de método de pago es obligatorio.',
            'metodo.string' => 'El campo de método de pago debe ser una cadena de texto.',
            'aceites.required' => 'La compra debe tener productos.',
            'aceites.array' => 'Error en el formato de aceites.',
            'cantidad.required' => 'Se debe incluir al menos una cantidad de producto.',
            'cantidad.array' => 'Error en el formato de cantidad.',
            'cantidad.*' => 'Cada cantidad debe ser un número entero.',
            'aceites.*.required' => 'Debes seleccionar al menos un aceite válido.',
            'aceites.*.integer' => 'El ID del aceite debe ser un número entero.',
            'aceites.*.exists' => 'El aceite seleccionado no está registrado.',
            'id_cliente.required' => 'Debes seleccionar un cliente para la compra.',
            'id_cliente.integer' => 'El ID del cliente debe ser un número entero.',
            'id_cliente.exists' => 'El cliente seleccionado no está registrado.',
            'cantidad.*.min' => 'La cantidad debe ser al menos 1.',
            'cantidad.*.max' => 'La cantidad no puede ser mayor que 999999.'
        ]);

        $aceitesSeleccionados = $request->aceites;
        $aceitesUnicos = array_unique($aceitesSeleccionados);

        if (count($aceitesSeleccionados) !== count($aceitesUnicos)) {
            return redirect()->back()->with('error', 'No puedes seleccionar el mismo aceite más de una vez en la misma compra.');
        }

        $idCliente = $request->input('id_cliente');

        $productIds = $request->input('aceites');
        $quantities = $request->input('cantidad');

        $total = 0;

        foreach ($productIds as $key => $productId) {
            $precioAceite = Aceite::find($productId)->precio;

            $total += $precioAceite * $quantities[$key];
        }

        $compra = new Compras();
        $compra->id_cliente = $idCliente;
        $compra->fecha = $request->fecha;
        $compra->metodo = $request->metodo;
        $compra->total = $total;
        $compra->save();

        foreach ($request->aceites as $key => $aceiteId) {
            DetalleCompra::create([
                'id_compra' => $compra->id_compra,
                'id_aceite' => $aceiteId,
                'cantidad' => $request->cantidad[$key],
            ]);
        }

        return redirect('/compras');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {  
        $id = $request->input('id_compra');
        $compra = Compras::find($id);
        $detalle = DetalleCompra::find($id);

        if (Gate::allows('view', $compra)) {
            return view('compras.show', compact('compra'));
        } else {
            abort(403, 'No tienes permiso para ver esta compra.');
        }
            
        if (!$compra) {
            return redirect()->back()->with('errorc', 'La compra no se encontró.');
        }

        return view('/compras/showCompras', ['compra' => $compra, 'detalle' => $detalle]);
    }

    //si quisieramos pasar solo el id, se podría hacer el find directamente y colocarlo en la URL


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $compras = Compras::find($id);
        $aceites = Aceite::all();
        $clientes = Cliente::all();

        if (!$compras) {
            return redirect()->route('compras.index')->with('error', 'La compra no se encontró.');
        }

        return view('/compras/editCompras', ['compras' => $compras, 'aceites' => $aceites, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'metodo' => 'required|string',
            'aceites' => 'required|array',
            'cantidad' => 'required|array',
            'cantidad.*' => 'required|integer|min:1|max:999999',
            'aceites.*' => 'required|integer|exists:aceites,id_aceite',
            'id_cliente' => 'required|integer|exists:clientes,id_cliente'
        ], [
            'fecha.required' => 'El campo de fecha es obligatorio.',
            'fecha.date' => 'El campo de fecha debe ser una fecha válida.',
            'metodo.required' => 'El campo de método de pago es obligatorio.',
            'metodo.string' => 'El campo de método de pago debe ser una cadena de texto.',
            'aceites.required' => 'La compra debe tener productos.',
            'aceites.array' => 'Error en el formato de aceites.',
            'cantidad.required' => 'Se debe incluir al menos una cantidad de producto.',
            'cantidad.array' => 'Error en el formato de cantidad.',
            'cantidad.*' => 'Cada cantidad debe ser un número entero.',
            'aceites.*.required' => 'Debes seleccionar al menos un aceite válido.',
            'aceites.*.integer' => 'El ID del aceite debe ser un número entero.',
            'aceites.*.exists' => 'El aceite seleccionado no está registrado.',
            'id_cliente.required' => 'Debes seleccionar un cliente para la compra.',
            'id_cliente.integer' => 'El ID del cliente debe ser un número entero.',
            'id_cliente.exists' => 'El cliente seleccionado no está registrado.',
            'cantidad.*.min' => 'La cantidad debe ser al menos 1.',
            'cantidad.*.max' => 'La cantidad no puede ser mayor que 999999.'
        ]);

        $aceitesSeleccionados = $request->aceites;
        $aceitesUnicos = array_unique($aceitesSeleccionados);

        if (count($aceitesSeleccionados) !== count($aceitesUnicos)) {
            return redirect()->back()->with('error', 'No puedes seleccionar el mismo aceite más de una vez en la misma compra.');
        }

        $idCliente = $request->input('id_cliente');
    
        $compras = Compras::find($id);
    
        if (!$compras) {
            return redirect()->route('compras.index')->with('error', 'La compra no se encontró.');
        }

        $productIds = $request->input('aceites');
        $quantities = $request->input('cantidad');

        $total = 0;

        foreach ($productIds as $key => $productId) {
            $precioAceite = Aceite::find($productId)->precio;

            $total += $precioAceite * $quantities[$key];
        }
        
        $compras->id_cliente = $idCliente;
        $compras->fecha = $request->fecha;
        $compras->metodo = $request->metodo;
        $compras->total = $total;
        $compras->save();

        $productIds = $request->input('aceites');
        $quantities = $request->input('cantidad');

        $compras->detallesCompras()->delete();

        foreach ($productIds as $key => $productId) {
            if ($productId && $quantities[$key]) {
                $compras->detallesCompras()->create([
                    'id_aceite' => $productId,
                    'cantidad' => $quantities[$key],
                ]);
            }
        }
    
        return redirect()->route('compras.index')->with('success', 'La compra se ha actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $compras = Compras::find($id);

        if (!$compras) {
            return redirect()->route('compras.index')->with('error', 'La compra no se encontró.');
        }

        $compras->delete();

        return redirect()->route('compras.index')->with('success', 'La compra se ha eliminado con éxito.');
    }  
}
