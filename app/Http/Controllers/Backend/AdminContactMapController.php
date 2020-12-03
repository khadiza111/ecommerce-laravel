<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMap;

class AdminContactMapController extends Controller
{
    public function index()
    {
    	$con_map = ContactMap::orderBY('id', 'desc')->get();
    	return view('backend.admin.pages.contact_map.index', compact('con_map'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
        [
           'country' => ['required'],
           'phone' => ['required'],
           'address' => ['required'],
        ],
        [
            'country.required' => 'Please provide name of country!', 
            'phone.required' => 'Please provide phone number!', 
            'address.required' => 'Please provide address!',
        ]);

        $con_map = new ContactMap();
        $con_map->country = $request->country;
        $con_map->phone = $request->phone;
        $con_map->address = $request->address;

        $con_map->save();

        session()->flash('success', 'Map Detail inserted successfully!');
        return redirect()->route('admin.all_contactMap');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
           'country' => ['required'],
           'phone' => ['required'],
           'address' => ['required'],
        ],
        [
            'country.required' => 'Please provide name of country!', 
            'phone.required' => 'Please provide phone number!', 
            'address.required' => 'Please provide address!',  
        ]);

        $con_map = ContactMap::find($id);
        $con_map->country = $request->country;
        $con_map->phone = $request->phone;
        $con_map->address = $request->address;

        $con_map->save();

        session()->flash('success', 'Map Detail has been updated successfully !');
        return redirect()->route('admin.all_contactMap');
    }

    public function delete($id)
    {
        $con_map = ContactMap::find($id);
        if (!is_null($con_map)) {
            $con_map->delete();
        }
        session()->flash('success', 'Map detail has been deleted !');
        return back();
    }
}
