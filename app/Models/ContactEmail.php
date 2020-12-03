<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    public $fillable = [
    	'name',
    	'email',
    	'subject',
    	'phone',
    	'message'
    ];
}
