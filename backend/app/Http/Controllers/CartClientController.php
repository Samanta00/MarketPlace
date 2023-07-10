<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartClient;


class CartClientController extends Controller
{
    protected $model;
    public function __construct(CartService $cart){
        $this->model=$cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //função para ler os valores chamados da model
    public function index()
    {
        return response()->json($this->model->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //função para adicionar novos valores para a model
    public function store(Request $request)
    {
        try {
            $this->model->create($request->all());
            return response('Criado com sucesso');
        } catch (Exception $exception) {
            throw $exception;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    //função para atualizar por id 
    public function update(Request $request, $id)
    {
        $cart = $this->model->find($id);
        if (!$cart) {
            return response('product not found');
        }
        try {
            $data = $request->all();
            $cart->fill($data)->save();
            return response('your product was updated');
        } catch (\Throwable $th) { // Definir o tipo de exceção como \Throwable
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //função que irá remover por id
    public function destroy($id)
    {
        $cart = $this->model->find($id);
        if (!$cart) {
            return response("category not found");
        }
        try {
            $cart->delete();
            return response("category was deleted");
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
