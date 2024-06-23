<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryType;

class GalleryController extends Controller
{
    public function index(Request $request)
{
    $galleryTypeId = $request->input('gallery_type_id');
    $galleryType = GalleryType::findOrFail($galleryTypeId);
    $galleryItems = Gallery::where('gallery_type_id', $galleryTypeId)->get();


    return view('admin.gallery.index', compact('galleryItems', 'galleryTypeId', 'galleryType'));
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
        $galleryItem->gallery_type_id = $request->input('gallery_type_id');


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
