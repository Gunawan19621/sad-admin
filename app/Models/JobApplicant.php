<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;
    protected $table = 'tb_job_applicants';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'question1',
        'question2',
        'cv_applicant',
        'created_at',
        'updated_at',
    ];
}
