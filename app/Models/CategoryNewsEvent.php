<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNewsEvent extends Model
{
    use HasFactory;
    protected $table = 'tb_category_news_event';
    protected $fillable = [
        'name_category_news_event',
        'created_at',
        'updated_at',
    ];
}
