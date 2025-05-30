<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tb_product';
    protected $fillable = [
        'id_sub_category',
        'image_product', // dibawah
        'name_product',
        'sub_product',
        'description_product', // di bawah setelah image_product
        'year_product',
        'alcohol',
        'temperature',
        'cellaring',
        'total_acidity',
        'ressidual_sugar',
        'bottle_produced',
        'size_bottle',
        'award_won',
        'characteristics',
        'testing_note',
        'food_pairing',
        'created_at',
        'updated_at',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'id_sub_category');
    }
}
