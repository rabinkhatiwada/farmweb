<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = Gallery::all(); // Retrieve all gallery items
        return view('admin.gallery.index', compact('galleryItems'));
    }

    public function store(Request $request)
    {
        $request->validate([]);

        $galleryItem = new Gallery();
        $galleryItem->title = $request->input('title');
        $galleryItem->youtube_url = $request->input('youtube_url');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/gallery_images');
            $galleryItem->image = $imagePath;
        }

        $galleryItem->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item added successfully!');
    }

    public function destroy($id)
    {
        $galleryItem = Gallery::findOrFail($id);
        $galleryItem->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item deleted successfully!');
    }
}
