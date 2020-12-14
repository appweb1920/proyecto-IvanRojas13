<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http \Request;   

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.crea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guardaDato = $request->validate([
            'nombre' => 'required|max:255',
            'cantidad' => 'required|numeric',
            'precioVenta' => 'required|numeric',
            'precioCompra' => 'required|numeric',
            'proveedor' => 'required|max:255',
        ]);
        $producto = Productos::create($guardaDato);
        return redirect('/productos')->with('Completado', 'Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Productos::findorfail($id);
        return view('producto.edita', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guardaDato = $request->validate([
            'nombre' => 'required|max:255',
            'cantidad' => 'required|numeric',
            'precioVenta' => 'required|numeric',
            'precioCompra' => 'required|numeric',
            'proveedor' => 'required|max:255',
        ]);
        Productos::whereId($id)->update($guardaDato);
        return redirect('/productos')->with('Completado', 'Guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::findorfail($id);
        $producto->delete();

        return redirect('/productos')->with('Completado', 'Eliminado');
    }
}
