<?php
namespace app\Repositories;

class ProductsRepositoryEloquent implements ProductsRepositoryInterface{
protected $model;
public function __construct($model){
    return $this->model=$model;
}

public function store(array $data){
    return $this->model->create($data);
}

public function get($id){
    return $this->model->find($id);
}

public function getList(){
    return $this->model->all();
}



public function update(array $data, $id){
    return $this->model->find($id)->update($data);
}

public function destroy($id){
    return $this->model->find($id)->delete();
}

}

?>