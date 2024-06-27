<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFaq extends Model
{
    use HasFactory;
    protected $table = 'tb_category_faq';
    protected $fillable = [
        'name_category_faq',
        'created_at',
        'updated_at',
    ];
}
