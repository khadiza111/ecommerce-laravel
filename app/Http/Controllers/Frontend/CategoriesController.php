<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$all_categories = Category::orderBY('id', 'desc')->get();
       // return view('frontend.pages.categories.index', compact('all_categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('frontend.pages.categories.show', compact('category'));
        } else {
            session()->flash('errors', 'Category does not exist !');
            return redirect('/');
        }
    }

}
