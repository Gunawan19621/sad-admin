<?php

namespace App\Models;

use App\Models\SuadeProductType;
use App\Models\SuadeProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_product';
    protected $fillable = [
        'id',
        'name_product',
        'image_product',
        'price_product',
        'discount_product',
        'description_product',
        'additional_product',
        'subtitle_product',
        'status_product',
        'category_id',
        'type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Relasi ke SuadeProductCategory
    public function productCategory()
    {
        return $this->belongsTo(SuadeProductCategory::class, 'category_id', 'id');
    }

    // Relasi ke SuadeProductType
    public function productType()
    {
        return $this->belongsTo(SuadeProductType::class, 'type_id', 'id');
    }
}
