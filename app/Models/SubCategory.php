<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'tb_sub_category';
    protected $fillable = [
        'id_category_product',
        'name_sub_category',
        'image_sub_category'
    ];
}
