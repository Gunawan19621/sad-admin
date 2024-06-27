<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'tb_contact_us';
    protected $fillable = [
        'address',
        'operating_hours',
        'email',
        'phone',
        'fax',
        'social_media',
        'google_maps',
        'created_at',
        'updated_at'
    ];
}
