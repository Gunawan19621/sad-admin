<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
    protected $table = 'tb_our_team';
    protected $fillable = [
        'name_team',
        'job_team',
        'image_team',
        'created_at',
        'updated_at',
    ];
}
