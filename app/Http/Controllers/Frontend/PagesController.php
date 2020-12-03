<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Category;
use App\Models\ContactDetails;
use App\Models\ContactEmail;
use App\Models\ContactMap;
use App\Models\BlogPost;
use App\Mail\SendMail;

class PagesController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBY('priority', 'asc')->get();
    	$products = Product::orderBY('id', 'desc')->paginate(4);
        $categories = Category::orderBY('id', 'desc')->get();
        $criteria_one = Product::orderBY('id', 'asc')->where('criteria_id', 1)->get();
        $criteria_two = Product::orderBY('id', 'asc')->where('criteria_id', 2)->get();
        $criteria_three = Product::orderBY('id', 'asc')->where('criteria_id', 3)->get();
    	return view('frontend.pages.index', compact('products', 'sliders', 'categories', 'criteria_one', 'criteria_two', 'criteria_three'));
    }

/*.............................. Contact Methods start here............... */
    /* Here, we use contact() as our Contact index() */
    public function contact()
    {
        $con_map = ContactMap::orderBY('id', 'desc')->get();
        $con_details = ContactDetails::orderBY('id', 'asc')->get();
    	return view('frontend.pages.contact', compact('con_details', 'con_map'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'min:3'],
            'phone' => ['required', 'numeric'],
            'message' => ['required', 'min:10'],
        ]);

        $data = new ContactEmail;
        // $data = array(
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'message' => $request->message
        // );
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->phone = $request->phone;
        $data->message = $request->message;

        $data->save();

        // Mail::send('dynamic_email_template', $data, function($mess) use ($data){
        //     $mess->from($data['email']);
        //     $mess->to('all.laravelsite@gmail.com');
        //     $mess->subject($data['subject']);
        // });

        Mail::to('all.laravelsite@gmail.com')->send(new SendMail($data));

        return back()->with('success', 'Thanks for contacting us!');

        // $con_form->name = $request->name;
        // $con_form->email = $request->email;
        // $con_form->message = $request->message;
        // $con_form->save();
    }
/* ..........................Contact Methods end here................. */

    public function search(Request $request)
    {
    	$search = $request->search;

    	$products = Product::orWhere('title', 'like', '%'.$search.'%')
    			->orWhere('description', 'like', '%'.$search.'%')
    			->orWhere('slug', 'like', '%'.$search.'%')
    			->orWhere('price', 'like', '%'.$search.'%')
    			->orWhere('quantity', 'like', '%'.$search.'%')
    			->orderBY('id', 'desc')
    			->paginate(2);
    	//$collection[] = $search;		

        //return view('frontend.pages.product.search', compact('search', 'products', 'collection'));      
    	return view('frontend.pages.product.search', compact('search', 'products'));		
    }

    public function blog()
    {
        $recent_posts = BlogPost::orderBY('id', 'desc')->where('blog_criteria_id', 2)->get(); 
        $outdated_posts = BlogPost::orderBY('id', 'desc')->where('blog_criteria_id', 4)->get();
        $blog_posts = BlogPost::orderBY('id', 'desc')->paginate(3); 
        return view('frontend.pages.blog', compact('blog_posts', 'recent_posts', 'outdated_posts'));
    }

    public function blogpost_detail($id)
    {
        $blogpost_detail = BlogPost::orderBY('id', 'desc')->where('id', $id)->get(); 
        $recent_posts = BlogPost::orderBY('id', 'desc')->where('blog_criteria_id', 2)->get();
        $outdated_posts = BlogPost::orderBY('id', 'desc')->where('blog_criteria_id', 4)->get();
        return view('frontend.pages.blogpost_detail', compact('blogpost_detail', 'recent_posts', 'outdated_posts'));
    }
    
}


































