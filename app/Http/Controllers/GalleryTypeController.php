<?php

namespace App\Http\Controllers;

use App\Models\GalleryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GalleryTypeController extends Controller
{
    // Display the form and list all gallery types
    public function index()
    {
        $galleryTypes = GalleryType::all();

        return view('admin.gallerytype.index', compact('galleryTypes'));
    }

    // Show the form for creating a new gallery type
    public function create()
    {
        return view('admin.gallerytype.create');
    }

    // Store a new gallery type
    public function store(Request $request)
    {
        $request->validate([]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('gallery_types'), $imageName);
        } else {
            $imageName = null;
        }
        $galleryType = new GalleryType();
        $galleryType->title = $request->input('title');
        $galleryType->image = $imageName;
        $galleryType->save();



        return redirect()->route('admin.gallerytype.index')->with('success', 'Gallery type created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit(Request $request, GalleryType $galleryType)
    {
        if ($request->getMethod() == 'POST') {
            $imagePath = $galleryType->image;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('gallery_types'), $imageName);
            } else {
                $imageName = null;
            }
            $galleryType->title = $request->input('title');
            $galleryType->image = $imageName;
            // dd($galleryType);
            $galleryType->save();
            return redirect()->route('admin.gallerytype.index')->with('success','Gallery Type Edited Successfully');
        } else {
            return view('admin.gallerytype.edit', compact('galleryType'));
        }
    }

    // Update the specified resource in storage
    // public function update(, $id)
    // {
    //     $request->validate([
    //     ]);



    // }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $galleryType = GalleryType::findOrFail($id);

        if ($galleryType->image) {
            File::delete(public_path($galleryType->image));
        }

        $galleryType->delete();

        return redirect()->route('admin.gallerytype.index')->with('success', 'Gallery type deleted successfully.');
    }
}
