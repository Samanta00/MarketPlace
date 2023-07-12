<?php

namespace App\Http\Controllers;

use App\Services\ProductsService;
use Illuminate\Http\Request;

class ProductController
{
    private $productService;

    public function __construct(ProductsService $productService)
    {
        $this->productService = $productService;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product = $this->productService->store($data);
        return response()->json($product, 201);
    }

    public function get($id)
    {
        // Chame o método get do ProductsService
        $product = $this->productService->get($id);
        return response()->json($product, 201);
    }

    public function getList()
    {
        // Chame o método getList do ProductsService
        $products = $this->productService->getList();

        return response()->json($products, 201);
    }

    public function update(Request $request, $id)
    {
        // Obtenha os dados atualizados do produto do request
        $data = $request->all();

        // Chame o método update do ProductsService
        $product = $this->productService->update($data, $id);

        return response()->json($product, 201);
    }

    public function destroy($id)
    {

        $product =  $this->productService->destroy($id);
        return response()->json($product, 201);
    }
}
