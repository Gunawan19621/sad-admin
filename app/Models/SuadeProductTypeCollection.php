<?php

namespace App\Models;

use App\Models\SuadeProductType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeProductTypeCollection extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_product_type_collection';
    protected $fillable = [
        'id',
        'product_type_id',
        'name_collection',
        'images_collection',
        'status_collection',
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
