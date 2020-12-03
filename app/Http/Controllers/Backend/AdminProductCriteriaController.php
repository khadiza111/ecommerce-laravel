<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCriteria;

class AdminProductCriteriaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$mng_criterias = ProductCriteria::orderBy('name', 'desc')->get();
        return view('backend.admin.pages.criteria.index', compact('mng_criterias'));
    }

    //insert page criteria
    public function create()
    {
        return view('backend.admin.pages.criteria.create');
    }

    //edit criteria
    public function edit($id)
    {
        //$main_cats = ProductCriteria::orderBy('name', 'desc')->get();
    	$criteria = ProductCriteria::find($id);
        if (!is_null($criteria)) {
            return view('backend.admin.pages.criteria.edit', compact('criteria'));
        } else {
            return redirect()->route('admin.all_criterias');
        }
    }

    //update criteria
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
           'name' => ['required', 'max:25'],
        ],
        [
            'name.required' => 'Please provide a criteria for product!',  
        ]);


        $criteria = ProductCriteria::find($id);
        $criteria->name = $request->name;
        
        $criteria->save();

        session()->flash('success', 'Criteria has been updated successfully!');
        return redirect()->route('admin.all_criterias');
    }


    //Insert/Store Criteria
    public function store(Request $request)
    {
    	//validate Data in Form
    	$validatedData = $request->validate(
        [
	       'name' => ['required', 'max:30', 'unique:product_criterias'],
		],
        [
            'name.required' => 'Please provide a criteria name', 
        ]);

        	//store/insert criterias
        	$criteria = new ProductCriteria;
        	$criteria->name = $request->name;

            $criteria->save(); 

        session()->flash('success', 'Criteria has been added successfully!');
    	return redirect()->route('admin.all_criterias');
    }

    //delete criteria
    public function delete($id)
    {
    	$criteria = ProductCriteria::find($id);
    	if (!is_null($criteria)) {
    		$criteria->delete();
    	}
    	session()->flash('success', 'Criteria has been deleted !');
    	return back();
    }
}
