<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    
  //função para ler os valores chamados da model
    public function __construct(Categories $model)
    {
        $this->model = $model;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response()->json($this->model->all());
    }


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
    // //função para adicionar novos valores para a model
    // public function store(Request $request)
    // {
    //     try {
    //         $this->model->create($request->all());
    //         return response('Criado com sucesso');
    //     } catch (Exception $exception) {
    //         throw $exception;
    //     }
    // }

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
        //
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
        $category = $this->model->find($id);
        if (!$category) {
            return response("category not found");
        }
        try {
            $category->delete();
            return response("category was deleted");
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
