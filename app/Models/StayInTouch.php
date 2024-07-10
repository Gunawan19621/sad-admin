<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StayInTouch extends Model
{
    use HasFactory;
    protected $table = 'tb_stay_in_touch';
    protected $fillable = [
        'email',
        'created_at',
        'updated_at',
    ];
}
