<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'mobileno',
        'address_line_one',
        'address_line_two',
        'country_name',
        'city_name',
        'state_name',
        'size_code',
     
    ];
}
