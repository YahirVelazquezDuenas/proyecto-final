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


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compras $compras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compras $compras)
    {
        //
    }
}
