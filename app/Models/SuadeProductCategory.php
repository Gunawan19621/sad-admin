<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeProductCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_product_category';
    protected $fillable = [
        'id',
        'name_category',
        'status_category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
