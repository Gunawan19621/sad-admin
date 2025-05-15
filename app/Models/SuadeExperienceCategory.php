<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeExperienceCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_experience_category';
    protected $fillable = [
        'name_experience_category',
        'status_experience_category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
