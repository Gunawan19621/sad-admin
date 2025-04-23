<?php

namespace App\Models;

use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuadeAccount extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_suade_account';
    protected $fillable = [
        'firstname_account',
        'lastname_account',
        'email_account',
        'birthdate_account',
        'password_account',
        'status_account',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
