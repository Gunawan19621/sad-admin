<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStory extends Model
{
    use HasFactory;
    protected $table = 'tb_our_story';
    protected $fillable = [
        'image_story',
        'title_story',
        'description_story',
        'year_story',
        'created_at',
        'updated_at',
    ];
}
