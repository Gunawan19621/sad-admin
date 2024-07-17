<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResortImage extends Model
{
    use HasFactory;
    protected $table = 'tb_resorts_image';
    protected $fillable = [
        'id_resort',
        'image_resort'
    ];


    public function resort()
    {
        return $this->belongsTo(Resort::class);
    }
}