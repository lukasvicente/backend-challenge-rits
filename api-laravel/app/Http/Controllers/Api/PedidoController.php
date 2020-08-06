<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;

class PedidoController extends Controller
{
    private $pedidos;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
         
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
               
        $cliente_id = $request->cliente_id;

        if( !$cliente_id  ){

            return response()->json(["error" => "cliente_id not informed"], 400);

        }
         
        $pedidos = Pedido::with('cliente')->
        where('cliente_id', $cliente_id)->        
        get();
        
            return response()->json(["Pedidos" => $pedidos]);
        
        }catch (\Exception $e) {

            return response()->json([$e], 400);
            
        }
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

            $cliente_id = $request->cliente_id;

            if( !$cliente_id  ){

                return response()->json(["error" => "cliente_id not informed"], 400);
    
            }

            $produtos = $request->produto_id;

            if( !$produtos  ){

                return response()->json(["error" => "produto_id not informed"], 400);
    
            }

            $dateForm = ['cliente_id' => $cliente_id];
            $dateForm += ['status' => "pendente"];
            
            $validate = validator($dateForm, $this->pedido->rules);

            if ($validate->fails()) {
                
                return response()->json($validate->Errors(), 400);

            }
      
            $insert = $this->pedido->create($dateForm);
            
            $pedido_id = $insert->id;
            $pedido = Pedido::with('cliente')->
            findOrFail($pedido_id);

            \App\Jobs\newEmailPedidoCreate::dispatch($pedido);
            foreach($produtos as $produto_id){

                $produto  = Produto::find($produto_id);
                $pedidos = Pedido::find($pedido_id)->produto()->attach($produto);


            }

            
            
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
    public function show(Request $request, $id)
    {

        try{

        $cliente_id = $request->cliente_id;
        if( !$cliente_id  ){

            return response()->json(["error" => "cliente_id not informed"], 400);

        }
         
        $pedidos = Pedido::with('produto')->
        where([['cliente_id','=',$cliente_id],
        ['id','=',$id]])->        
        get();
         
        $count = $pedidos->count();
        
        if( $count == 0 ){
            return response()->json("Pedido not exists", 400);
        }
        
            return response()->json(  $pedidos );

        }catch (\Exception $e) {

            return response()->json([$e], 400);
             
        }
         
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
    public function destroy(Request $request, $id)
    {
        try {

            $cliente_id = $request->cliente_id;

            if( !$cliente_id  ){

                return response()->json(["error" => "cliente_id not informed"], 400);

            }

            $pedido = Pedido::findOrFail($id)->
            where('cliente_id', $cliente_id)->delete();
            
             
        
            if( !$pedido  ){
                return response()->json(["error" => "Delete action is invalid"], 401);
            }
            
            
            return response()->json('Delete Sucess');

        } catch (Exception $e) {
            
            return response()->json([$e], 400);
        }
    }
}
