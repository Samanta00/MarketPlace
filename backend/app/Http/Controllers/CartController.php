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
    return $this->service->update([
        'product_name' => $data['product_name'],
        'category_id' => $data['category_id'],
        'product_price' => $data['product_price'],
        'expiration_date' => $data['expiration_date'],
        'perishable_product' => $data['perishable_product'],
        'stock_quantity' => $data['stock_quantity']
    ]);
}

public function destroy($id){
    return $this->service->destroy();
}
}

?>