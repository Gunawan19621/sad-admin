<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'tb_faq';
    protected $fillable = [
        'id_category_faq',
        'question_faq',
        'answer_faq',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryFaq::class, 'id', 'id_category_faq');
    }
}