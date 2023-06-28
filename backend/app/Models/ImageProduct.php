<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 // Campos que serão repassar/receber para a tabela do banco de dados
class Imagem extends Model
{
    protected $fillable = ['category_id'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}
