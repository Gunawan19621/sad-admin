<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeExperienceImages extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_experience_images';
    protected $fillable = [
        'id',
        'image_experience',
        'experience_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}