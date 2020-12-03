<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class AdminDivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$divisions = Division::orderBy('priority', 'asc')->get();
        return view('backend.admin.pages.division.index')->with('divisions', $divisions);
    }

    public function create()
    {
    	return view('backend.admin.pages.division.create');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate(
        [
	       'name' => ['required'],
	       'priority' => ['required'],
		],
        [
            'name.required' => 'Please provide a division name', 
            'priority.required' => 'Division priority is required', 
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flash('success', 'Division has been inserted successfully!');
        return redirect()->route('admin.all_divisions');
    }

    public function edit($id)
    {
    	$division = Division::find($id);
    	if (!is_null($division)) {
    		return view('backend.admin.pages.division.edit', compact('division'));
    	} else {
    		return redirect()->route('admin.all_divisions');
    	}
    }

    public function update(Request $request, $id)
    {
    	$validatedData = $request->validate(
        [
	       'name' => ['required'],
	       'priority' => ['required'],
		],
        [
            'name.required' => 'Please provide a division name', 
            'priority.required' => 'Division priority is required', 
        ]);

        $division = Division::find($id);
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flash('success', 'Division has been updated successfully !');
        return redirect()->route('admin.all_divisions');
    }

    public function delete($id)
    {
    	$division = Division::find($id);
    	if (!is_null($division)) {
            $districts = District::where('division_id', $division->id)->get();
                foreach ($districts as $dist) {
    		      $dist->delete();
                 } 
    	}
    	session()->flash('success', 'Division has been deleted !');
    	return back();
    }
}
