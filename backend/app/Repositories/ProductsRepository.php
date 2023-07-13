<?php
namespace App\Repositories;

use App\Models\Products;



class ProductsRepository implements ProductsRepositoryInterface
{
    public function store(array $data)
    {
        // Implemente a lógica para armazenar os dados no banco de dados
        // Exemplo: use o modelo Products para criar um novo registro
        return Products::create($data);
    }

    public function getList()
    {
        // Implemente a lógica para recuperar uma lista de produtos
        // Exemplo: use o modelo Products para buscar todos os registros
        return Products::all();
    }

    public function get($id)
    {
        // Implemente a lógica para recuperar um produto pelo ID
        // Exemplo: use o modelo Products para buscar um registro específico
        return Products::find($id);
    }

    public function update(array $data, $id)
    {
        // Implemente a lógica para atualizar um produto
        // Exemplo: use o modelo Products para atualizar o registro
        $product = Products::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function destroy($id)
    {
        // Implemente a lógica para excluir um produto
        // Exemplo: use o modelo Products para excluir o registro
        $product = Products::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}
