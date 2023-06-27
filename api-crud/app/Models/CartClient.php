<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartClient extends Model
{
    use HasFactory;

    protected $table = 'clients_carts';

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'product_name',
        'category_id',
        'product_price',
        'expiration_date',
        'perishable_product',
        'stock_quantity',
    ];

    // Defina as relações com outros modelos, se houver
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}
