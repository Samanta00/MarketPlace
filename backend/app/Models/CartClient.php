<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartClient extends Model
{
    use HasFactory;

    protected $table = 'clients_carts';

    // Campos que serão repassar/receber para a tabela do banco de dados
    protected $fillable = [
        'product_name',
        'category_id',
        'product_price',
        'expiration_date',
        'perishable_product',
        'stock_quantity',
    ];
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}
