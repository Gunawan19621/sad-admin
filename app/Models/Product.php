<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tb_product';
    protected $fillable = [
        'id_distributor',
        'id_category_product',
        'image_product',
        'name_product',
        'description_product',
        'price_product',
        'stock_product',
        'created_at',
        'updated_at',
    ];
}
