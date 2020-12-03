<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public $fillable = [
    	'title',
    	'sub_title',
    	'image',
    	'description'
    ];
}
