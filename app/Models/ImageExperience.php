<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageExperience extends Model
{
    use HasFactory;
    protected $table = 'tb_image_experience';
    protected $fillable = [
        'id_experience',
        'image_experience',
        'created_at',
        'updated_at',
    ];
}
