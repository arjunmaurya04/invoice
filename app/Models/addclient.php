<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addclient extends Model
{
    use HasFactory;

    protected $table = 'addclients';

    protected $fillable = [
        'company_name',
        'website_url',
        'email',
        'client_number',
        'address',
    ];
}
