<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'tb_category_product';
    protected $fillable = [
        'name_category_product',
        'description_category_product'
    ];
}