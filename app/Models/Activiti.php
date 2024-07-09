<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activiti extends Model
{
    use HasFactory;
    protected $table = 'tb_activiti';
    protected $fillable = [
        'image_activiti',
        'title_activiti',
        'subtitle_activiti',
        'description_activiti',
        'created_at',
        'updated_at',
    ];
}
