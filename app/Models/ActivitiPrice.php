<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitiPrice extends Model
{
    use HasFactory;
    protected $table = 'tb_activiti_price';
    protected $fillable = [
        'id_activiti',
        'price_activiti',
        'name_price',
        'created_at',
        'updated_at',
    ];
}
