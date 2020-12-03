<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class AdminDistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$districts = District::orderBy('name', 'asc')->get();
        return view('backend.admin.pages.district.index')->with('districts', $districts);
    }

    public function create()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
    	return view('backend.admin.pages.district.create', compact('divisions'));
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate(
        [
	       'name' => ['required'],
	       'division_id' => ['required'],
		],
        [
            'name.required' => 'Please provide a district name', 
            'division_id.required' => 'Division Id is required', 
        ]);

        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flash('success', 'District has been inserted successfully!');
        return redirect()->route('admin.all_districts');
    }

    public function edit($id)
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
    	$district = District::find($id);
    	if (!is_null($district)) {
    		return view('backend.admin.pages.district.edit', compact('district', 'divisions'));
    	} else {
    		return redirect()->route('admin.all_districts');
    	}
    }

    public function update(Request $request, $id)
    {
    	$validatedData = $request->validate(
        [
	       'name' => ['required'],
	       'division_id' => ['required'],
		],
        [
            'name.required' => 'Please provide a district name', 
            'division_id.required' => 'District division_id is required', 
        ]);

        $district = District::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flash('success', 'District has been updated successfully !');
        return redirect()->route('admin.all_districts');
    }

    public function delete($id)
    {
    	$district = District::find($id);
    	if (!is_null($district)) {
    		$district->delete();
    	}
    	session()->flash('success', 'District has been deleted !');
    	return back();
    }

}
