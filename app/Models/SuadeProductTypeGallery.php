<?php

namespace App\Models;

use App\Models\SuadeProductType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeProductTypeGallery extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_product_type_gallery';
    protected $fillable = [
        'id',
        'image_product_type',
        'product_type_id',
        'status_gallery',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Relasi ke SuadeProductType
    public function productType()
    {
        return $this->belongsTo(SuadeProductType::class, 'product_type_id', 'id');
    }
}
