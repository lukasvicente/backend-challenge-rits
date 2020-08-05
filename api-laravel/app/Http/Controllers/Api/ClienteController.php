<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    private $clientes;

    public function __construct(Cliente $clientes)
    {
        $this->cliente = $clientes;
         
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cliente_id = $request->cliente_id;
         
        $pedidos = Cliente::with('pedido')->
        where('id', $cliente_id)->         
        get();
        
        return response()->json(["Pedidos" => $pedidos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $dateForm = $request->all();

            $validate = validator($dateForm, $this->cliente->rules);

            if ($validate->fails()) {
                
                return response()->json($validate->Errors(), 400);

            }

            $insert = $this->cliente->create($dateForm);

            return response()->json(["created" => $insert],201);

        }catch (\Exception $e) {

            return response()->json([$e], 400);
             
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
