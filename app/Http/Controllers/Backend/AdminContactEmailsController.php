<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactEmail;

class AdminContactEmailsController extends Controller
{
    public function index()
    {
    	$con_emails = ContactEmail::orderBY('id', 'desc')->get();
    	return view('backend.admin.pages.contact_emails.index', compact('con_emails'));
    }

    public function delete($id)
    {
        $con_emails = ContactEmail::find($id);
        if (!is_null($con_emails)) {
            $con_emails->delete();
        }
        session()->flash('success', 'An User email has been deleted !');
        return back();
    }
}
