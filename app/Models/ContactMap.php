<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMap extends Model
{
    public $fillable = [
    	'country',
    	'phone',
    	'address'
    ];
}
