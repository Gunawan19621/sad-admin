<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'tb_sub_category';
    protected $fillable = [
        'id_category_product',
        'name_sub_category',
        'image_sub_category'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id_sub_category');
    }
}