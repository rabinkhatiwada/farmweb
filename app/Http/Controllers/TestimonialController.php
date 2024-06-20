<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', ['testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('admin.testimonials.add');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('testimonial_images'), $imageName);
        } else {
            $imageName = null;
        }

        $testimonial = new Testimonial();
        $testimonial->name = $request->input('name');
        $testimonial->address = $request->input('address');
        $testimonial->image = $imageName;
        $testimonial->content = $request->input('content');
        $testimonial->save();

        return redirect()->route('admin.testimonials.add')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit($testimonial)
    {
        $testimonial = Testimonial::findOrFail($testimonial);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, $testimonial)
    {
        $request->validate([]);

        $testimonial = Testimonial::findOrFail($testimonial);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('testimonial_images'), $imageName);
            $testimonial->image = $imageName;
        }

        $testimonial->name = $request->input('name');
        $testimonial->address = $request->input('address');
        $testimonial->content = $request->input('content');
        $testimonial->save();

        return redirect()->route('admin.testimonials.edit', $testimonial->id)->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy($testimonial)
    {
        $testimonial = Testimonial::findOrFail($testimonial);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
