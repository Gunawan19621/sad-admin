<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $table = 'tb_awards';
    protected $fillable = [
        'image_awards',
        'title_awards',
        'created_at',
        'updated_at',
    ];
}