<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurVision extends Model
{
    use HasFactory;
    protected $table = 'tb_our_vision';
    protected $fillable = [
        'image_vision',
        'title_vision',
        'description_vision',
        'created_at',
        'updated_at',
    ];
}