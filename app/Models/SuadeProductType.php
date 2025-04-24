<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeProductType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_product_type';
    protected $fillable = [
        'id',
        'name_type',
        'images_hero_type',
        'status_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}