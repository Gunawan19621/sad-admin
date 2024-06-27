<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperiencePrice extends Model
{
    use HasFactory;
    protected $table = 'tb_experience_price';
    protected $fillable = [
        'id_experience',
        'name_experience',
        'price_experience',
        'unit_experience',
        'created_at',
        'updated_at',
    ];
}
