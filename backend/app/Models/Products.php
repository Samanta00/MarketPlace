<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Campos que serão repassar/receber para a tabela do banco de dados
class Products extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
        'product_name',
        'category_id',
        'product_price',
        'expiration_date',
        'stock_quantity',
        'perishable_product',
    ];
}
