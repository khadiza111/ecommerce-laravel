<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use Image;
use File;

class AdminBlogPostsController extends Controller
{
    public function index()
    {
    	$blog_posts = BlogPost::orderBY('id', 'desc')->get();
    	return view('backend.admin.pages.blog.index', compact('blog_posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
        [
           'title' => ['required'],
           'sub_title' => ['required'],
           'image' => ['image'],
           'description' => ['required'],
           'blog_criteria_id' => ['required'],
        ],
        [
            'title.required' => 'Title is required!', 
            'sub_title.required' => 'Sub Title is required!', 
            'image.image' => 'File type must be .jpg, .gif, .png, .jpeg', 
            'description.required' => 'Description is required!',
            'blog_criteria_id.required' => 'Blog Criteria is required!',
        ]);

        $blog_posts = new BlogPost();
        $blog_posts->title = $request->title;
        $blog_posts->sub_title = $request->sub_title;

        //insert image   
    	 if ($request->image > 0) {
    	 		
    	 	//insert image in folder
            $image = $request->file('image');
    	 	$img   = time(). '.' . $image->getClientOriginalExtension();
    	 	$location = 'public/images/blogPosts/'. $img;
    	 	Image::make($image)->save($location);

    	 	//insert image in Database
	    	$blog_posts->image = $img;
    	 }  
       
        $blog_posts->description = $request->description;
        $blog_posts->blog_criteria_id = $request->blog_criteria_id;

        $blog_posts->save();

        session()->flash('success', 'A post for blog inserted successfully!');
        return redirect()->route('admin.all_blogPosts');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
           'title' => ['required'],
           'sub_title' => ['required'],
           'description' => ['required'],
           'blog_criteria_id' => ['required'],
        ],
        [
            'title.required' => 'Title is required!', 
            'sub_title.required' => 'Sub Title is required!', 
            'description.required' => 'Description is required!', 
            'blog_criteria_id.required' => 'Blog Criteria is required!', 
        ]);

        $blog_posts = BlogPost::find($id);
        $blog_posts->title = $request->title;
        $blog_posts->sub_title = $request->sub_title;

        //Update image
        if ($request->image > 0)  {
            
            //delete old image from folder
            if (File::exists('public/images/blogPosts/'. $blog_posts->image)) {
                File::delete('public/images/blogPosts/'. $blog_posts->image);
            }
            $image = $request->file('image');
            $img   = time(). '.' . $image->getClientOriginalExtension();
            $location = 'public/images/blogPosts/'. $img;
            Image::make($image)->save($location);

            //insert image in Database
        $blog_posts->image = $img; 
        } 

        $blog_posts->description = $request->description;
        $blog_posts->blog_criteria_id = $request->blog_criteria_id;

        $blog_posts->save();

        session()->flash('success', 'A post for blog has been updated successfully !');
        return redirect()->route('admin.all_blogPosts');
    }

    public function delete($id)
    {
        $blog_posts = BlogPost::find($id);
    	if (!is_null($blog_posts)) {
    		$blog_posts->delete();

            // Delete blog post image from folder
                    if (File::exists('public/images/blogPosts/'. $blog_posts->image)) 
                    {
                        File::delete('public/images/blogPosts/'. $blog_posts->image);
                    }
        $blog_posts->delete();            
    	}
        session()->flash('success', 'A post for blog has been deleted !');
        return back();
    }
}
