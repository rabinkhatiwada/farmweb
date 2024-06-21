<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Helper;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Testimonial;

class ClientController extends Controller
{
    public function index()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $faqs = Blog::where('type', 'faq')->get();
        $brands = Blog::where('type', 'brand')->get();
        $teams = Blog::where('type', 'team')->get();
        $services = Blog::where('type', 'service')->get();
        $objectives = Blog::where('type', 'objective')->get();
        $features = Blog::where('type', 'feature')->get();

        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;
        $testimonial = Testimonial::all();
        $sliders = Slider::all();
        $galleryItems = Gallery::all();




        return view('user.home', compact('blogs', 'types','testimonial', 'blogType', 'faqs', 'brands', 'teams', 'services', 'objectives', 'features', 'sliders', 'galleryItems'));
    }

    public function about()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $faqs = Blog::where('type', 'faq')->get();
        $brands = Blog::where('type', 'brand')->get();
        $teams = Blog::where('type', 'team')->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.about', compact('blogs', 'types', 'blogType', 'faqs', 'brands', 'teams'));
    }

    public function services()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $faqs = Blog::where('type', 'faq')->get();
        $services = Blog::where('type', 'service')->get();

        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.service', compact('blogs', 'types', 'blogType', 'faqs', 'services'));
    }

    public function blogs()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.blog', compact('blogs', 'types', 'blogType'));
    }

    public function blogShow($blog)
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.blogdetail', compact('blog', 'blogs', 'types', 'blogType'));
    }

    public function contact()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.contact', compact('blogs', 'types', 'blogType'));
    }


}
