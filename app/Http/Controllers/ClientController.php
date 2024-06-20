<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Helper;
use App\Models\Testimonial;

class ClientController extends Controller
{
    public function index()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $faqs = Blog::where('type', 'faq')->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;
        $testimonial = Testimonial::all();


        return view('user.home', compact('blogs', 'types','testimonial', 'blogType', 'faqs'));
    }

    public function about()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $faqs = Blog::where('type', 'faq')->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.about', compact('blogs', 'types', 'blogType', 'faqs'));
    }

    public function services()
    {
        $type = 'blog';
        $blogs = Blog::where('type', $type)->get();
        $faqs = Blog::where('type', 'faq')->get();
        $types = Helper::blogTypes;
        $blogType = Helper::blogTypes[$type] ?? null;

        return view('user.service', compact('blogs', 'types', 'blogType', 'faqs'));
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

        return view('user.blog.show', compact('blog', 'blogs', 'types', 'blogType'));
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
