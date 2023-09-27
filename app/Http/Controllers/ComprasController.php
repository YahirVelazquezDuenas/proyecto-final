<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras= new Compras ();

        $comprasIndex = Compras::all();

        return view('compras/indexCompras', compact ('comprasIndex'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compras/createCompras');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'metodo' => 'required|string',
            'total' => 'required|numeric',
        ]);

        $compra = new Compras();
        $compra->fecha = $request->fecha;
        $compra->metodo = $request->metodo;
        $compra->total = $request->total;
        $compra->save();

        return redirect('/compras');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');
        $compra = Compras::find($id);
            
        if (!$compra) {
            return redirect()->back()->with('error', 'La compra no se encontró.');
        }

        return view('/compras/showCompras', ['compra' => $compra]);
    }

    //si quisieramos pasar solo el id, se podría hacer el find directamente y colocarlo en la URL


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $compras = Compras::find($id);

        if (!$compras) {
            return redirect()->route('compras.index')->with('error', 'La compra no se encontró.');
        }

        return view('/compras/editCompras', ['compras' => $compras]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'metodo' => 'required|string',
            'total' => 'required|numeric',
        ]);
    
        $compras = Compras::find($id);
    
        if (!$compras) {
            return redirect()->route('compras.index')->with('error', 'La compra no se encontró.');
        }
    
        $compras->fecha = $request->fecha;
        $compras->metodo = $request->metodo;
        $compras->total = $request->total;
        $compras->save();
    
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
