<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ProductsService;

class ProductController
{
    private $productService;

    public function __construct(ProductsService $productService)
    {
        $this->productService = $productService;
    }

    public function store($request) {
        // Obtenha os dados do produto do request
        $data = $request->all();

        // Chame o método store do ProductsService
        $product = $this->productService->store($data);
     
    }

    public function get($id) {
        // Chame o método get do ProductsService
        $product = $this->productService->get($id);


    }

    public function getList() {
        // Chame o método getList do ProductsService
        $products = $this->productService->getList();

    
    }

    public function update($request, $id) {
        // Obtenha os dados atualizados do produto do request
        $data = $request->all();

        // Chame o método update do ProductsService
        $product = $this->productService->update($data, $id);


        
    }

    public function destroy($id) {
        
        $this->productService->destroy($id);

    }
}
?>