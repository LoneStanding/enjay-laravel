<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsBlog extends Model
{
    protected $fillable = [
        'news_title',
        'tag',
        'image_path',
        'content',
    ];
}
