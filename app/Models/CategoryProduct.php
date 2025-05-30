<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'tb_category_product';
    protected $fillable = [
        'name_category_product',
        'description_category_product',
        'subtitle_category',
        'created_at',
        'updated_at',
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'id_category_product');
    }
}