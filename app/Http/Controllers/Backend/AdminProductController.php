<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Models\Product;
use\App\Models\ProductImage;
use Illuminate\Support\Str;
use Image;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	//show all products
    public function index()
    {
        $mg_products = Product::orderBy('id', 'desc')->get();
    	//$product_img = ProductImage::get();
        return view('backend.admin.pages.product.index')->with('products', $mg_products);
    }

    //insert page product
    public function create()
    {
    	return view('backend.admin.pages.product.create');
    }

    //edit product
    public function edit($id)
    {
    	$edit_product = Product::find($id);
    	return view('backend.admin.pages.product.edit')->with('product', $edit_product);
    }

    //update product
    public function update(Request $request, $id)
    {
        //validate Data in Form
        $validatedData = $request->validate([
        'title' => ['required', 'max:25'],
        'description' => ['required'],
        'price' => ['required', 'numeric'],
        'offer_price' => ['required', 'numeric'],
        'quantity' => ['required', 'numeric'],
        'category_id' => ['required', 'numeric'],
        'brand_id' => ['required', 'numeric'],
        //'criteria_id' => ['required', 'numeric'],
        //'product_image' => ['required'],
        ]);


        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
        $product->criteria_id = $request->criteria_id;

        $product->save();

        return redirect()->route('admin.all_products');
    }


    public function store(Request $request)
    {
    	//validate Data in Form
    	$validatedData = $request->validate([
	    'title' => ['required', 'max:25'],
	    'description' => ['required'],
        'price' => ['required', 'numeric'],
	    // 'offer_price' => ['numeric'],
        'quantity' => ['required', 'numeric'],
        'category_id' => ['required', 'numeric'],
	    'brand_id' => ['required', 'numeric'],
	    'product_image' => ['required'],
		]);

    	//store/insert product
    	$product = new Product;

    	$product->title = $request->title;
    	$product->description = $request->description;
        $product->price = $request->price;
    	$product->offer_price = $request->offer_price;
    	$product->quantity = $request->quantity;
    	$product->slug = str::slug($request->title);
    	$product->category_id = $request->category_id;
    	$product->brand_id = $request->brand_id;
    	$product->admin_id = 1;
        $product->criteria_id = $request->criteria_id;

    	$product->save();

    	 if (count($request->product_image) > 0) {
            $i = 0;
    	 	foreach ($request->product_image as $image) {
    	 		
    	 		//insert image in folder
    	 		$img   = time(). $i . '.' . $image->getClientOriginalExtension();
    	 		$location = 'public/images/products/'. $img;
    	 		Image::make($image)->save($location);

    	 		//insert image in Database
	    	 	$product_image = new ProductImage;
	    	 	$product_image->product_id = $product->id;
	    	 	$product_image->image = $img;
	    	 	$product_image->save(); 
                $i++;
    	 	}
    	 }


    	return redirect()->route('admin.all_products');
    }

    public function delete($id)
    {
    	$product = Product::find($id);
    	if (!is_null($product)) {
    		$product->delete();
    	}

        //Delete all images from database against this product
        foreach ($product->images as $img) {
            //Delete images from path/folder
            $file_name = $img->image;
            if (file_exists("public/images/products/". $file_name)) {
                unlink("public/images/products/". $file_name);
            }
        $img->delete();
        }

    	Session()->flash('success', 'Product has been deleted successfully!');
    	return back();
    }
}
