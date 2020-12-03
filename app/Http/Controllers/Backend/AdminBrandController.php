<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Models\Brand;
//use Illuminate\Support\Str;
use Image;
use File;

class AdminBrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	//show all brands
    public function index()
    {
        $mng_brands = Brand::orderBy('id', 'desc')->get();
    	//$product_img = ProductImage::get();
    	return view('backend.admin.pages.brand.index')->with('brands', $mng_brands);
    }

    //got to brand insert page 
    public function create()
    {
    	return view('backend.admin.pages.brand.create');
    }

    //edit brands
    public function edit($id)
    {
    	$brand = Brand::find($id);
        if (!is_null($brand)) {
            return view('backend.admin.pages.brand.edit', compact('brand'));
        } else {
            return redirect()->route('admin.all_brands');
        }  
    }

    //update brands
    public function update(Request $request, $id)
    {
        //validate Data in Form
        $validatedData = $request->validate([
        'name' => ['required', 'max:25'],
        'description' => ['required'],
        ],
        [
            'name.required' => 'Brand name is required !', 
            'description.required' => 'Brand description is required !', 
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
    	$brand->description = $request->description;

        //Update image
        if ($request->image > 0)  {
            
            //delete old image from folder
            if (File::exists('public/images/brands/'. $brand->image)) {
                File::delete('public/images/brands/'. $brand->image);
            }
            $image = $request->file('image');
            $img   = time(). '.' . $image->getClientOriginalExtension();
            $location = 'public/images/brands/'. $img;
            Image::make($image)->save($location);

        //Update image in Database
        $brand->image = $img; 
        } 
        $brand->save();

        session()->flash('success', 'Brand has been updated successfully!');
        return redirect()->route('admin.all_brands');
    }


    //Insert/Store Category
    public function store(Request $request)
    {
    	//validate Data in Form
        $validatedData = $request->validate([
        'name' => ['required', 'max:25'],
        'description' => ['required'],
        ],
        [
            'name.required' => 'Please provide a brand name !', 
            'description.required' => 'Please provide brand description !', 
        ]);

    	//store/insert brand
    	$brand = new Brand;
    	$brand->name = $request->name;
    	$brand->description = $request->description;

            //Insert/store image
            if ($request->image > 0)  {
                
                //insert/store image in folder
                $image = $request->file('image');
                $img   = time(). '.' . $image->getClientOriginalExtension();
                $location = 'public/images/brands/'. $img;
                Image::make($image)->save($location);

        //Insert/store image in Database
        $brand->image = $img; 
        } 
        $brand->save();

        session()->flash('success', 'Brand has been inserted successfully!');
        return redirect()->route('admin.all_brands');
    }

    //delete brand
    public function delete($id)
    {
    	$brand = Brand::find($id);
    	if (!is_null($brand)) {
    		$brand->delete();

            // Delete brand image from folder
                    if (File::exists('public/images/brands/'. $brand->image)) 
                    {
                        File::delete('public/images/brands/'. $brand->image);
                    }
        $brand->delete();            
    	}
    	Session()->flash('success', 'Brand has deleted successfully!');
    	return back();
    }
}


