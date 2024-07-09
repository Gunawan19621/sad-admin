<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageActiviti extends Model
{
    use HasFactory;
    protected $table = 'tb_image_activiti';
    protected $fillable = [
        'id_activiti',
        'image',
        'created_at',
        'updated_at',
    ];
}
