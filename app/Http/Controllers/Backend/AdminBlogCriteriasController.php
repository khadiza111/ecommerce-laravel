<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCriteria;

class AdminBlogCriteriasController extends Controller
{
    public function index()
    {
    	$blog_criterias = BlogCriteria::orderBY('id', 'desc')->get();
    	return view('backend.admin.pages.blog_criterias.index', compact('blog_criterias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
        [
           'name' => ['required'],
        ],
        [
            'name.required' => 'Name field is required!', 
        ]);

        $blog_criterias = new BlogCriteria();
        $blog_criterias->name = $request->name;

        $blog_criterias->save();

        session()->flash('success', 'A criteria for blog inserted successfully!');
        return redirect()->route('admin.all_blog_criterias');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
           'name' => ['required'],
        ],
        [
            'name.required' => 'Name is required!',  
        ]);

        $blog_criterias = BlogCriteria::find($id);
        $blog_criterias->name = $request->name;

        $blog_criterias->save();

        session()->flash('success', 'A criteria for blog has been updated successfully !');
        return redirect()->route('admin.all_blog_criterias');
    }

    public function delete($id)
    {
        $blog_criterias = BlogCriteria::find($id);
    	if (!is_null($blog_criterias)) {
    		$blog_criterias->delete();         
    	}
        session()->flash('success', 'A criteria for blog has been deleted !');
        return back();
    }
}
