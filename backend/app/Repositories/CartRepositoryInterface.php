<?php

interface CartRepositoryInterface {
    // public function __contruct(Model $model);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data,$id);
    public function destroy($id);
}
?>