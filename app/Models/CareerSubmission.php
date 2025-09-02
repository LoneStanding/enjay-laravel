<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerSubmission extends Model
{
    protected $fillable = [
        'referal_name',
        'gender',
        'name',
        'nationality',
        'job_title',
        'email',
        'phone',
        'experience',
        'current_salary',
        'expected_salary',
        'path_to_cv',
    ];
}
