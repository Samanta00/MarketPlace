<?php

class CartController extends Controller {
private $service;
public function __construct(CartService $service){
     $this->service=$service;
}

public function store(array $data){
    return $this->service->store($data);
}

public function get(array $id){
    return $this->service->get($id);
}

public function getList(){
    return $this->service->getList();
}



public function update(array $data, $id){
    return $this->service->update($data, $id);
}

public function destroy($id){
    return $this->service->destroy();
}
}

?>