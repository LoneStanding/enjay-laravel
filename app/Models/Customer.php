<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer_list';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'location',
        'requirements'
    ];
}
