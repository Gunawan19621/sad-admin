<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurDistributor extends Model
{
    use HasFactory;
    protected $table = 'tb_our_distributors';
    protected $fillable = [
        'name_distributor',
        'image_distributor',
        'address_distributor',
        'name_person_distributor',
        'phone_distributor',
        'created_at',
        'updated_at',
    ];
}
