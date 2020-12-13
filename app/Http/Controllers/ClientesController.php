<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Productos;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();
        $data = array("lista_productos" => $productos);

        $clientes = Clientes::all();
        return response()->view('cliente.indexCliente', compact('clientes', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.creaCliente');
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
            'apellido' => 'required|max:255',
            'numTelefono' => 'required|numeric',
            'deuda' => 'required|numeric',
        ]);
        $cliente = Clientes::create($guardaDato);
        return redirect('/clientes')->with('Completado', 'Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Productos::all();
        $data = array("lista_productos" => $productos);

        $cliente = Clientes::findorfail($id);
        return view('cliente.agregaProducto', $data)->with('cliente',$cliente);
        //return view('cliente.agregaProducto', compact('cliente'));
        //return response()->view('cliente.agregaProducto', compact('cliente'));

        //return response()->view('cliente.agregaProducto', compact('$data'), compact('cliente'));    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::findorfail($id);
        return view('cliente.editaCliente', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function nuevoProd($id)
    {
        $productos = Productos::all();
        $data = array("lista_productos" => $productos);

        $clientes = Clientes::findorfail($id);
        //return view('cliente.listaProductosCliente', $data)->with('cliente',$clientes);
        return view('cliente.listaProductosCliente')->with('cliente',$clientes)->with('producto',$productos);
        //return response()->view('cliente.listaProductosCliente', compact('clientes', $data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guardaDato = $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'numTelefono' => 'required|numeric',
            'deuda' => 'required|numeric',
            'producto_id' =>'numeric',
            'pago' =>'numeric',
        ]);

        Clientes::whereId($id)->update($guardaDato);
        return redirect('/clientes')->with('Completado', 'Guardado');
    }

    public function registraPago($id)
    {
        $clientes = Clientes::findorfail($id);
        return view('cliente.registraPago')->with('cliente',$clientes);
    }

    public function restaDeuda(Request $request, $id)
    {
        
        $guardaDato = $request->validate([
            'pago' =>'numeric',
        ]);
        $pagado = $request->input('pago');
        Clientes::whereId($id)->decrement('deuda', $pagado);


        //Clientes::whereId($id)->update($guardaDato);
        return redirect('/clientes')->with('Completado', 'Guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {

    }
}
