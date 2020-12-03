<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Models\Product;
use\App\Models\ProductImage;
use Illuminate\Support\Str;
use Image;

class AdminPagesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index()
    {
    	return view('backend.admin.pages.index');
    }
    
}


































