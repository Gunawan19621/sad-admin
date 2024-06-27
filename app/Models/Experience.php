<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'tb_experience';
    protected $fillable = [
        'title_experience',
        'subtitle_experience',
        'description_experience',
        'created_at',
        'updated_at',
    ];
}