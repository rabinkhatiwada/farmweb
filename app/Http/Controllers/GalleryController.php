<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryType;
use App\Helper;



class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleryTypeId = $request->input('gallery_type_id');
        $galleryType = GalleryType::findOrFail($galleryTypeId);
        $galleryItems = Gallery::where('gallery_type_id', $galleryTypeId)->get();


        return view('admin.gallery.index', compact('galleryItems', 'galleryTypeId', 'galleryType'));
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         // Add your validation rules here
    //     ]);
    
    //     $galleryItem = new Gallery();
    //     $galleryItem->title = $request->input('title');
    //     $galleryItem->youtube_url = $request->input('youtube_url');
    
    //     if ($request->hasFile('image')) {
    //         $imageFile = $request->file('image');
    //         $imageName = $imageFile->getClientOriginalName();
    
    //         // Move the uploaded file to the correct destination
    //         $imageFile->move(public_path('gallery_images'), $imageName);
    
    //         // Set the path to the original image
    //         $galleryItem->image = 'gallery_images/' . $imageName;
    
    //         // Generate and save the thumbnail
    //         // $thumbnailPath = $this->createThumbnail(public_path($galleryItem->image), public_path('gallery_images/thumbnails'));
    //         $thumbnailPath = Helper::createThumbnail(public_path($galleryItem->image), public_path('gallery_images/thumbnails'));

    //         if ($thumbnailPath) {
    //             $galleryItem->thumb = $thumbnailPath;
    //         } else {
    //             // Handle if thumbnail creation fails
    //             $galleryItem->thumb = null; // or any default thumbnail path
    //         }
    //     }
    
    //     $galleryItem->gallery_type_id = $request->input('gallery_type_id');
    
    //     $galleryItem->save();
    
    //     return redirect()->route('admin.gallery.index')->with('success', 'Gallery item added successfully!');
    // }
    public function store(Request $request)
{
    $request->validate([
        // Add your validation rules here
    ]);

    $galleryItem = new Gallery();
    $galleryItem->title = $request->input('title');
    $galleryItem->youtube_url = $request->input('youtube_url');

    if ($request->hasFile('image')) {
        $imageFile = $request->file('image');
        $imageName = $imageFile->getClientOriginalName();

        // Move the uploaded file to the correct destination
        $imageFile->move(public_path('gallery_images'), $imageName);

        // Set the path to the original image
        $galleryItem->image = 'gallery_images/' . $imageName;

        // Generate and save the thumbnail
        $thumbnailPath = Helper::createThumbnail(public_path($galleryItem->image), public_path('gallery_images/thumbnails'));

        if ($thumbnailPath) {
            $galleryItem->thumb = $thumbnailPath;
        } else {
            // Handle if thumbnail creation fails
            $galleryItem->thumb = null; // or any default thumbnail path
        }
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
