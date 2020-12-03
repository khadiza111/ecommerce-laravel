<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Models\Category;
//use Illuminate\Support\Str;
use Image;
use File;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	//show all categories
    public function index()
    {
        //$category = new Category;
        $mng_categories = Category::orderBy('id', 'desc')->get();
    	//$product_img = ProductImage::get();
        return view('backend.admin.pages.category.index')->with('categories', $mng_categories);
    }

    //insert page categories
    public function create()
    {
        //$main_cats = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $main_cats = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('backend.admin.pages.category.create', compact('main_cats'));
    }

    //edit categories
    public function edit($id)
    {
        $main_cats = Category::orderBy('name', 'desc')->get();
    	$category = Category::find($id);
        if (!is_null($category)) {
            return view('backend.admin.pages.category.edit', compact('category', 'main_cats'));
        } else {
            return redirect()->route('admin.all_categories');
        }
    }

    //update categories
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
           'name' => ['required', 'max:25'],
           //'description' => ['required'],
           //'parent_id' => ['numeric'],
           'image' => ['nullable', 'image'],
        ],
        [
            'name.required' => 'Please provide a category name', 
            'image.image' => 'File type must be .jpg, .gif, .png, .jpeg', 
        ]);


        $category = Category::find($id);
        $category->name = $request->name;
    	$category->description = $request->description;
    	

        //Update image
        if ($request->image > 0)  {
            
            //delete old image from folder
            if (File::exists('public/images/categories/'. $category->image)) {
                File::delete('public/images/categories/'. $category->image);
            }
            $image = $request->file('image');
            $img   = time(). '.' . $image->getClientOriginalExtension();
            $location = 'public/images/categories/'. $img;
            Image::make($image)->save($location);

            //insert image in Database
        $category->image = $img; 
        } 
        $category->parent_id = $request->parent_id;
        $category->save();

        session()->flash('success', 'Category has been updated successfully!');
        return redirect()->route('admin.all_categories');
    }


    //Insert/Store Category
    public function store(Request $request)
    {
    	//validate Data in Form
    	$validatedData = $request->validate(
        [
	       'name' => ['required', 'max:30', 'unique:categories'],
	       //'description' => ['required'],
	       //'parent_id' => ['numeric'],
	       'image' => ['nullable', 'image'],
		],
        [
            'name.required' => 'Please provide a category name', 
            'image.image' => 'File type must be .jpg, .gif, .png, .jpeg', 
        ]);

        	//store/insert categories
        	$category = new Category;
        	$category->name = $request->name;
            $category->description = $request->description;
            
         //insert image   
    	 if ($request->image > 0) {
    	 		
    	 	//insert image in folder
            $image = $request->file('image');
    	 	$img   = time(). '.' . $image->getClientOriginalExtension();
    	 	$location = 'public/images/categories/'. $img;
    	 	Image::make($image)->save($location);

    	 	//insert image in Database
	    	$category->image = $img;
    	 }        

            $category->parent_id = $request->parent_id; 
            $category->save(); 

        session()->flash('success', 'Category has been added successfully!');
    	return redirect()->route('admin.all_categories');
    }

    //delete category
    public function delete($id)
    {
    	$category = Category::find($id);
    	if (!is_null($category)) {
           // If it is parent category, then delete all the sub categories..
                    if ($category->parent_id == NULL) {
                        // Delete sub categories
                                $sub_cats = Category::orderBy('id', 'desc')->where('parent_id', $category->id)->get();
                                foreach ($sub_cats as $sub) {
                                    //sub image delete from folder
                                    if (File::exists('public/images/categories/'. $sub->image)) 
                                    {
                                        File::delete('public/images/categories/'. $sub->image);
                                    }
                                    $sub->delete();
                                }
                    } 
            // Delete category image from folder
                    if (File::exists('public/images/categories/'. $category->image)) 
                    {
                        File::delete('public/images/categories/'. $category->image);
                    }
    	$category->delete();
    	}
    	Session()->flash('success', 'Category has been deleted successfully!');
    	return back();
    }
/*
    public function parentCat()
    {
        //$category = Category::find();
        $parent_cat = Category::orderBy('id')->get();
        return view('backend.admin.pages.category.edit')->compact('parent_cat');
    }
    */
}

