<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductsService;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        // Obtenha os dados do produto do objeto Request
        $data = $request->all();

        // Chame o método store() do serviço para armazenar o produto
        $product = $this->service->store($data);

        // Retorne uma resposta adequada, como um JSON com o produto criado
        return response()->json($product, 201);
    }

    public function get($id) {
        // Chame o método get do ProductsService
        $product = $this->service->get($id);

        return response()->json($product, 200);

    }

    public function getList() {
        // Chame o método getList do ProductsService
        $products = $this->service->getList();

        return response()->json($products, 200);

    }

    public function update(Request $request, $id)
    {
        // Obtenha os dados atualizados do produto do objeto Request
        $data = $request->all();
    
        // Chame o método update do ProductsService
        $product = $this->service->update($data, $id);
    
        // Verifique se o produto foi atualizado com sucesso
        if ($product) {
            return response()->json($product, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }
    
    public function destroy($id) {
        
        $this->service->destroy($id);

    }
}
?>