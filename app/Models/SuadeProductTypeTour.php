<?php

namespace App\Models;

use App\Models\SuadeProductType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeProductTypeTour extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_product_type_tour';
    protected $fillable = [
        'id',
        'product_type_id',
        'title_tour',
        'images_tour',
        'description_tour',
        'subtitle_tour',
        'status_tour',
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