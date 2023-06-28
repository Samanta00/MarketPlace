<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 // Campos que serão repassar/receber para a tabela do banco de dados
class Categories extends Model
{
    use HasFactory;
    protected $table="categories_products";
    protected $fillable=[
        'category_gender'
    ];
}
