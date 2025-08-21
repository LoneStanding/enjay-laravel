<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeBanners extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_path', // add any other fields you want mass assignable
    ];
}
