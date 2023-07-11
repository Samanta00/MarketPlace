<?php

interface ProductsRepositoryInterface {
    // public function __contruct($model);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data,$id);
    public function destroy($id);

}
?>