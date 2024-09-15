<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addservice extends Model
{
    use HasFactory;

    protected $table = 'addservices';

    protected $fillable = [
        'service_name',
        'service_charge',
        'service_description',
    ];
}
