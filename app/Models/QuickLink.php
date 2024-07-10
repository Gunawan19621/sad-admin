<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickLink extends Model
{
    use HasFactory;
    protected $table = 'tb_quick_link';
    protected $fillable = [
        'title',
        'description',
        'created_at',
        'updated_at',
    ];
}
