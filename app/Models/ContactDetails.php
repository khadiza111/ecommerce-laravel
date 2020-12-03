<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    public $fillable = [
    	'phone',
    	'address',
    	'open_time',
    	'email'
    ];
}
