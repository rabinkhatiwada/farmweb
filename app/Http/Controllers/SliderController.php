<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the sliders.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);

        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->button_text = $request->input('button_text');
        $slider->button_link = $request->input('button_link');
        $slider->image='';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slider_images'), $imageName);
            $slider->image = $imageName;
            $slider->youtubeurl = null;  // Clear YouTube URL if an image is uploaded
        } else {
            $slider->image = '';
            $slider->youtubeurl = $request->input('youtubeurl');
        }

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([]);

        $slider = Slider::findOrFail($id);
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->button_text = $request->input('button_text');
        $slider->button_link = $request->input('button_link');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slider_images'), $imageName);
            $slider->image = $imageName;
            $slider->youtubeurl = null;  // Clear YouTube URL if a new image is uploaded
        } else {
            $slider->image = null;
            $slider->youtubeurl = $request->input('youtubeurl');
        }

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified slider from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
