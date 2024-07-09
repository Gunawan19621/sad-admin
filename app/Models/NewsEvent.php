<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    use HasFactory;
    protected $table = 'tb_news_event';
    protected $fillable = [
        'id_category_news_event',
        'title_news_event',
        'image_news_event',
        'date_news_event',
        'description_news_event',
        'created_at',
        'updated_at',
    ];
}
