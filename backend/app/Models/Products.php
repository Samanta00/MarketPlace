<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    protected $fillable = [
        'product_name',
        'category_id',
        'product_price',
        'expiration_date',
        'stock_quantity',
        'perishable_product',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
