<?php

namespace App\Models;

use App\Models\SuadeExperienceCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuadeExperience extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_experience';
    protected $fillable = [
        'name_experience',
        'image_experience',
        'price_experience',
        'discount_experience',
        'description_experience', // ck editor
        'additional_experience', // ck editor
        'subtitle_experience',
        'status_experience',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo(SuadeExperienceCategory::class, 'category_id', 'id');
    }
}
