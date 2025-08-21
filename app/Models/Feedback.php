<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback_list';
    protected $fillable = [
        'name',
        'email',
        'rating',
        'comments'
    ];
}
