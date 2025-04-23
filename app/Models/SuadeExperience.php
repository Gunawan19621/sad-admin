<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeExperience extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_experience';
    protected $fillable = [
        'name_experience',
        'image_experience',
        'price_experience',
        'discount_experience',
        'description_experience',
        'additional_experience',
        'subtitle_experience',
        'status_experience',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}