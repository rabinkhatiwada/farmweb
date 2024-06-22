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
        $objectives = Blog::where('type', 'objective')->get();


        return view('user.about', compact('blogs', 'types', 'blogType', 'faqs', 'brands', 'teams', 'objectives'));
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
        $recentBlogs = Blog::where('type', $type)
                        ->orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();

        return view('user.blog', compact('blogs', 'types', 'blogType', 'recentBlogs', 'type'));
    }



    public function contact()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.contact', compact('blogs', 'types', 'blogType'));
    }

    public function breeding()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;
        $breeding = Blog::where('type', 'breeding')->get();


        return view('user.breeding', compact('blogs', 'types', 'blogType', 'breeding'));
    }
    public function feeding()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;
        $breeding = Blog::where('type', 'feeding')->get();


        return view('user.breeding', compact('blogs', 'types', 'blogType', 'breeding'));
    }
    public function management()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;
        $management = Blog::where('type', 'management')->get();


        return view('user.management', compact('blogs', 'types', 'blogType', 'management'));
    }
    public function market()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;
        $market = Blog::where('type', 'market')->get();


        return view('user.market', compact('blogs', 'types', 'blogType', 'market'));
    }

}
