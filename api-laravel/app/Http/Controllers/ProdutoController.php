<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('vendor.adminlte.management.produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.adminlte.management.produto.create', compact('produto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $dateForm = $request->all();
            
            $validate = validator($dateForm, $this->produto->rules);

            if ($validate->fails()) {
                return redirect()
                    ->route('produto.create')
                    ->withErrors($validate)
                    ->withInput();

            }
 
            $insert = $this->produto->create($dateForm);
 
            $insert->save();

            if ($insert) {

                return redirect()->route('produto.index')->with('success');
            } else {

                return redirect()->back();
            }

        } catch (Exception $e) {
            return redirect()->route('produto.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('vendor.adminlte.management.produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $dateForm = $request->all();
            $validate = validator($dateForm, $this->produto->rules);
            if ($validate->fails()) {
                return redirect()
                    ->route('produto.edit',$id)
                    ->withErrors($validate)
                    ->withInput();
            }

            $update = $this->produto->findOrFail($id)->update($dateForm);

            if ($update)
                return redirect()->route('produto.index')->with('success');
            else
                return redirect()->route($id,'produto.edit');
        } catch (Exception $e) {
            return redirect()->route('produto.index')->with('error', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            $produto = $this->produto->findOrFail($id)->delete();
            $response = array('status' => 'success');
            
            return redirect()->route('produto.index')->with('success');

        } catch (Exception $e) {
            
            $response = array('status' => 'fail', 'error' => $e->getMessage());
        }

        

    }
}
