<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use http\Exception\BadConversionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
           'dni'=> 'required|string|max:9|unique:clientes',
           'nombre'=> 'required|string|max:255',
           'apellidos'=> 'required|string|max:255',
           'direccion'=> 'required|string|max:255',
           'telefono'=> 'required|max:9',
           'pais'=> 'required|string|max:255'
        ]);
        $clienteAdd = new Cliente;
        $clienteAdd->dni = $request->dni;
        $clienteAdd->nombre = $request->nombre;
        $clienteAdd->apellidos = $request->apellidos;
        $clienteAdd->direccion = $request->direccion;
        $clienteAdd->telefono = $request->telefono;
        $clienteAdd->pais = $request->pais;
        $clienteAdd->save();
        return back()->with('agregar', 'Cliente Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $clientes = Cliente::all();
        return view('listaClientes')->with('clientes', $clientes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cliente $dni
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        $cliente = App\Models\Cliente::find($dni);
        $cliente->delete();

        return back()->with('clienteEliminado', 'Cliente Eliminado');
    }
}
