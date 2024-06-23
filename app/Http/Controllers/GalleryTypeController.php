<?php

namespace App\Http\Controllers;

use App\Models\GalleryType;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        GalleryType::create([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.gallerytype.index')->with('success', 'Gallery type created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $galleryType = GalleryType::findOrFail($id);
        return view('admin.gallerytype.update', compact('galleryType'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $galleryType = GalleryType::findOrFail($id);
        $galleryType->update([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.gallerytype.index')->with('success', 'Gallery type updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $galleryType = GalleryType::findOrFail($id);
        $galleryType->delete();

        return redirect()->route('admin.gallerytype.index')->with('success', 'Gallery type deleted successfully.');
    }
}
