<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBY('id', 'desc')->paginate(6);
    	$products_count = Product::orderBY('id')->get()->count();
        $criteria_two = Product::orderBY('id', 'asc')->where('criteria_id', 2)->get();
        $criteria_four = Product::orderBY('id', 'desc')->where('criteria_id', 4)->get();
    	return view('frontend.pages.product.index', compact('products', 'criteria_two', 'criteria_four', 'products_count'));
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->first();
        if (!is_null($product)) {
            return view('frontend.pages.product.show', compact('product'));
        }else {
            session()->flash('errors', 'No page...');
            return redirect()->route('products'); 
        }
    	
    }
}
