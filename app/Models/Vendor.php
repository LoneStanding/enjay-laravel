<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendor_list';
    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'address',
        'service_category'
    ];
}
