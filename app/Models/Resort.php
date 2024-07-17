<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;
    protected $table = 'tb_resorts';
    protected $fillable = [
        'title_resort',
        'subtitle_resort',
        'image',
        'description_resort',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->hasMany(ResortImage::class, 'id_resort');
    }
    
}