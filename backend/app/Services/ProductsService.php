<?php

namespace App\Services;
use App\Repositories\ProductsRepositoryInterface;

class ProductsService
{
    private $repo;

    public function __construct(ProductsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store(array $data)
    {
        return $this->repo->store($data);
    }

    public function get(array $id)
    {
        return $this->repo->get($id);
    }

    public function getList()
    {
        return $this->repo->getList();
    }

    public function update(array $data, $id)
    {
        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}
