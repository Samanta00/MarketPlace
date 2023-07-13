<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController {
    private $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function store(array $data) {

        return $this->cartService->store($data);

    }

    public function get(array $id) {
    
        return $this->cartService->get($id);
    }

    public function getList() {
        
        return $this->cartService->getList();
    }

    public function update($request, $id) {
        $data = $request->all();
        return $this->cartService->update($data, $id);


    }

    public function destroy($id) {
      
       return $this->cartService->destroy($id);

    }
}
?>