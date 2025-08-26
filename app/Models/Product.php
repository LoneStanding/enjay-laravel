<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category',
        'product_name',
        'product_category',
        'image_path',
        'content',
    ];
}
