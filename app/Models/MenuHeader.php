<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuHeader extends Model
{
    use HasFactory;
    protected $table = 'tb_header';
    protected $fillable = [
        'name_menu',
        'image_header',
        'title_header',
        'subtitle_header',
        'created_at',
        'updated_at',
    ];
}
