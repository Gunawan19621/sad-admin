<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = 'tb_enquiry';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'enquiring',
        'message',
        'our_newsletter',
        'created_at',
        'updated_at',
    ];
}
