<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactDetails;

class AdminContactDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	//show all brands
    public function index()
    {
        $con_details = ContactDetails::orderBy('id', 'desc')->get();
    	return view('backend.admin.pages.contact_details.index', compact('con_details'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
        [
           'phone' => ['required'],
           'email' => ['required', 'email'],
        ],
        [
            'phone.required' => 'Please provide a phone no.!', 
            'email.required' => 'Please provide an email id!', 
            'email.email' => 'Please provide a valid email address!', 
        ]);

        $con_details = new ContactDetails();
        $con_details->phone = $request->phone;
        $con_details->address = $request->address;
        $con_details->open_time = $request->open_time;
        $con_details->email = $request->email;

        $con_details->save();

        session()->flash('success', 'Contact Detail inserted successfully!');
        return redirect()->route('admin.all_contactDetails');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
           'phone' => ['required'],
           'email' => ['required', 'email'],
        ],
        [
            'phone.required' => 'Please provide a phone no.!', 
            'email.required' => 'Please provide an email id!', 
            'email.email' => 'Please provide a valid email address!',   
        ]);

        $con_details = ContactDetails::find($id);
        $con_details->phone = $request->phone;
        $con_details->address = $request->address;
        $con_details->open_time = $request->open_time;
        $con_details->email = $request->email;

        $con_details->save();

        session()->flash('success', 'Contact Detail has been updated successfully !');
        return redirect()->route('admin.all_contactDetails');
    }

    public function delete($id)
    {
        $con_details = ContactDetails::find($id);
        if (!is_null($con_details)) {
            $con_details->delete();
        }
        session()->flash('success', 'Contact Detail has been deleted !');
        return back();
    }

}
