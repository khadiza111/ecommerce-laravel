<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use File;
use Image;

class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('backend.admin.pages.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
        [
           'title' => ['required'],
           'image' => ['required', 'image'],
           'priority' => ['required'],
           'button_link' => ['nullable', 'url'],
        ],
        [
            'title.required' => 'Please provide a slider title!', 
            'image.required' => 'Please provide a slider image!', 
            'image.image' => 'Please provide a valid slider image!', 
            'priority.required' => 'Please select a priority for slider!',
            'button_link.url' => 'Please provide a valid slider button link!',  
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->priority = $request->priority;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;

        if ($request->image > 0) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'public/images/sliders/'. $img;
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        
        $slider->save();

        session()->flash('success', 'Slider has been inserted successfully!');
        return redirect()->route('admin.all_sliders');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
           'title' => ['required'],
           'image' => ['nullable', 'image'],
           'priority' => ['required'],
           'button_link' => ['nullable', 'url'],
        ],
        [
            'title.required' => 'Please provide a slider title!',  
            'image.image' => 'Please provide a valid slider image!', 
            'priority.required' => 'Please select a priority for slider!',
            'button_link.url' => 'Please provide a valid slider button link!',   
        ]);

        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        if ($request->image > 0) 
        {
            // Delete previous image
            if (File::exists('public/images/sliders/'. $slider->image)) 
            {
                File::delete('public/images/sliders/'. $slider->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'public/images/sliders/'. $img;
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();

        session()->flash('success', 'Slider has been updated successfully !');
        return redirect()->route('admin.all_sliders');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)) {
            // Delete Image
            if (File::exists('public/images/sliders/'. $slider->image)) {
                File::delete('public/images/sliders/'. $slider->image);
            }
            $slider->delete();
        }
        session()->flash('success', 'Slider has been deleted !');
        return back();
    }
}
