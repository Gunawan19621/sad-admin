<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'tb_partners';
    protected $fillable = [
        'name_partner',
        'image_partner',
        'created_at',
        'updated_at',
    ];
}
