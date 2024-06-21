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
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slider_images'), $imageName);
        } else {
            $imageName = null;
        }

        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->image = $imageName;
        $slider->button_text = $request->input('button_text');
        $slider->button_link = $request->input('button_link');
        $slider->save();

        return redirect()->route('admin.sliders.create')->with('success', 'Slider created successfully.');
    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit($slider)
    {
        $slider = Slider::findOrFail($slider);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, $slider)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $slider = Slider::findOrFail($slider);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slider_images'), $imageName);
            $slider->image = $imageName;
        }

        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->button_text = $request->input('button_text');
        $slider->button_link = $request->input('button_link');
        $slider->save();

        return redirect()->route('admin.sliders.edit', $slider->id)->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified slider from storage.
     */
    public function destroy($slider)
    {
        $slider = Slider::findOrFail($slider);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
