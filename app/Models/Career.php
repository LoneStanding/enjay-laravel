<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{

    protected $fillable = [
        'job_title',
        'qualification',
        'experience',
        'nationality',
        'job_status',
        'location',
        'job_description',
        'category',
    ];
}
