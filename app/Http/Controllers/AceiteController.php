<?php

namespace App\Http\Controllers;

use App\Models\Aceite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'cantidad' => 'nullable|numeric|max:999999.99|min:0',
            'marca' => 'nullable|string|max:255',
            'descripcion' => 'string|unique:aceites|max:255',
            'precio'=> 'required|numeric|max:999999.99|min:0',
            'archivo' => 'required|max:10000'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max'=>'El campo nombre no puede tener más de 255 caracteres',
            'tipo.string' => 'El campo tipo debe ser una cadena de texto.',
            'tipo.max'=>'El campo tipo no puede tener más de 255 caracteres',
            'cantidad.numeric' => 'El campo cantidad debe ser un número.',
            'cantidad.max'=>'El campo cantidad no puede ser mayor a 999,999.99',
            'cantidad.min' => 'El campo cantidad no puede ser negativo.',
            'marca.string' => 'El campo marca debe ser una cadena de texto.',
            'marca.max'=>'El campo marca no puede tener más de 255 caracteres',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'descripcion.max'=>'El campo descripción no puede tener más de 255 caracteres',
            'descripcion.unique' => 'La descripción ya está en uso.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.max'=>'El campo precio no puede ser mayor a 999,999.99',
            'precio.min' => 'El campo precio no puede ser negativo.',
        ]);

        $aceite = new Aceite();
        $aceite->nombre = $request->nombre;
        $aceite->tipo = $request->tipo;
        $aceite->cantidad = $request->cantidad;
        $aceite->marca = $request->marca;
        $aceite->descripcion = $request->descripcion;
        $aceite->precio=$request->precio;
        
        if($request->file('archivo')->isValid()){

            $request->file('archivo')->store('public/img');

        }
        $aceite->archivo_nombre = $request->file('archivo')->getClientOriginalName();
        $aceite->archivo_ubicacion = $request->file('archivo')->store('public/img');

        if ($aceite->save()) {
            return redirect('/aceite')->with('success', 'Aceite registrado correctamente.');
        } else {
            return redirect()->back()->withErrors(['Error al guardar el aceite. Por favor, intenta de nuevo.']);
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id_aceite');
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
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'cantidad' => 'nullable|numeric|max:999999.99|min:0',
            'marca' => 'nullable|string|max:255',
            'descripcion' => 'string|max:255|unique:aceites,descripcion,' . $id . ',id_aceite',
            'precio'=>'required|numeric|max:999999.99|min:0',
            'archivo' => 'max:10000'

        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max'=>'El campo nombre no puede tener más de 255 caracteres',
            'tipo.string' => 'El campo tipo debe ser una cadena de texto.',
            'tipo.max'=>'El campo tipo no puede tener más de 255 caracteres',
            'cantidad.numeric' => 'El campo cantidad debe ser un número.',
            'cantidad.max'=>'El campo cantidad no puede ser mayor a 999,999.99',
            'cantidad.min' => 'El campo cantidad no puede ser negativo.',
            'marca.string' => 'El campo marca debe ser una cadena de texto.',
            'marca.max'=>'El campo marca no puede tener más de 255 caracteres',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'descripcion.max'=>'El campo descripción no puede tener más de 255 caracteres',
            'descripcion.unique' => 'La descripción ya está en uso.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.max'=>'El campo precio no puede ser mayor a 999,999.99',
            'precio.min' => 'El campo precio no puede ser negativo.',
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
        $aceite->precio=$request->precio;
        //dd($request);
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()) {
            // Eliminar el archivo antiguo si existe
            if ($aceite->archivo_ubicacion) {
                Storage::delete($aceite->archivo_ubicacion); 
            }

            $aceite->archivo_nombre = $request->file('archivo')->getClientOriginalName();
            $aceite->archivo_ubicacion = $request->file('archivo')->store('public/img');
            //dd($aceite);
        }
            /*Eliminar las imagenes antiguas
                Storage::delete($aceite->aceite_ubicacion);
                $aceite->aceite_ubicacion->delete();
            
                $aceite->archivo_nombre = $request->file('archivo')->getClientOriginalName();
                $aceite->archivo_ubicacion = $request->file('archivo')->store('public/img');*/
        $aceite->save();
        return redirect()->route('aceite.index')->with('success', 'El aceite se ha actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aceite = Aceite::find($id);

        if ($aceite->archivo_ubicacion) {
            Storage::delete($aceite->archivo_ubicacion);
        }
    
        // Eliminar el modelo de la base de datos
        $aceite->delete();

        if (!$aceite) {
            return redirect()->route('aceite.index')->with('error', 'El aceite no se encontró.');
        }

        $aceite->delete();

        return redirect()->route('aceite.index')->with('success', 'El aceite se ha eliminado con éxito.');
    }

    public function descargar(Aceite $aceite){

        return Storage::download($aceite->archivo_ubicacion, $aceite->archivo_nombre);

    }


    public function destroyArchivo(Aceite $aceite)
    {
        // Verificar si hay un archivo asociado y eliminarlo
        if ($aceite->archivo_ubicacion) {
            Storage::delete($aceite->archivo_ubicacion);

            // Limpiar los campos de archivo en el modelo Aceite
            $aceite->update([
                'archivo_nombre' => null,
                'archivo_ubicacion' => null,
            ]);

            return redirect()->back()->with('success', 'Archivo eliminado correctamente.');
        }

        return redirect()->back()->with('error', 'No hay archivo asociado para eliminar.');
    }
}