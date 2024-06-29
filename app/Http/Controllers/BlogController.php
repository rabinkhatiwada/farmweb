<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        $blogs = DB::table('blogs')->where('type', $type)->get();
        $types = Helper::blogTypes;

        return view('admin.Blogs.index', compact('types', 'blogs', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        $blogType = Helper::blogTypes[$type];

        return view('admin.Blogs.add', compact('type', 'blogType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $type)
    {
        $blogType = Helper::blogTypes[$type];

        if ($request->getMethod() == "GET") {
            return view('admin.Blogs.add', compact('type', 'blogType'));
        } else {
            $imageName1 = null;
            $imageName2 = null;

            if ($request->hasFile('image1')) {
                $image1 = $request->file('image1');
                $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
                $image1->move(public_path('blog_images'), $imageName1);
            }

            if ($request->hasFile('image2')) {
                $image2 = $request->file('image2');
                $imageName2 = time() . '_2.' . $image2->getClientOriginalExtension();
                $image2->move(public_path('blog_images'), $imageName2);
            }

            $blog = new Blog();
            $blog->type = $type;
            $blog->title = $request->input('title', '');
            $blog->y_url = $request->input('y_url', '');
            $blog->fimg_Type = $request->filled('fimg_type') ? 2 : 1;
            $blog->content = $request->input('content', '');
            $blog->sdesc = $request->input('sdesc', '');
            $blog->image1 = $imageName1;
            $blog->image2 = $imageName2;
            $blog->facebook_url = $request->input('facebook_url', '#');
            $blog->instagram_url = $request->input('instagram_url', '#');
            $blog->linkedin_url = $request->input('linkedin_url', '#');
            $blog->twitter_url = $request->input('twitter_url', '#');

            $datas = [];
            foreach ($blogType[4] as $key => $input) {
                if ($input[0] == 'file' && $request->filled($input[1])) {
                    $file = $request->file($input[1]);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('blog_files'), $fileName);
                    // Process the file as needed
                    $datas[$input[1]] = $fileName;
                } else {
                    $datas[$input[1]] = $request->input($input[1], '');
                }
            }

            $blog->extra = json_encode($datas);
            $blog->save();

            return redirect()->route('admin.blogs.store', ['type' => $type])->with('success', 'Blog Created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($blog)
{
    $blog = Blog::findOrFail($blog);

    $blogType = Helper::blogTypes[$blog->type];

    $blogs = DB::table('blogs')->where('type', $blog->destroytype)->get();

    $previousBlog = Blog::where('id', '<', $blog->id)
                        ->where('type', $blog->type)
                        ->orderBy('id', 'desc')
                        ->first();

    $nextBlog = Blog::where('id', '>', $blog->id)
                    ->where('type', $blog->type)
                    ->orderBy('id')
                    ->first();

    $recentBlogs = Blog::where('type', $blog->type)
                        ->orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();

    return view('user.blogdetail', compact('blog', 'blogs', 'previousBlog', 'nextBlog', 'recentBlogs', 'blogType'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();
        $type=$blog->type;
        $blogType = Helper::blogTypes[$type];

        return view('admin.Blogs.edit', compact('blog', 'type', 'blogType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $type = $request->input('type');
    $blogType = Helper::blogTypes[$type];

    $request->validate([]);

    $blog = Blog::findOrFail($id);

    if ($request->hasFile('image1')) {
        $image1 = $request->file('image1');
        $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('blog_images'), $imageName1);
        $blog->image1 = $imageName1;
    }

    if ($request->hasFile('image2')) {
        $image2 = $request->file('image2');
        $imageName2 = time() . '_2.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('blog_images'), $imageName2);
        $blog->image2 = $imageName2;
    }

    $blog->type = $type;
    $blog->title = $request->input('title', '');
    $blog->y_url = $request->input('y_url', '');
    $blog->fimg_Type = $request->filled('fimg_type') ? 2 : 1;
    $blog->content = $request->input('content', '');
    $blog->sdesc = $request->input('sdesc', '');
    $blog->facebook_url = $request->input('facebook_url', '#');
    $blog->instagram_url = $request->input('instagram_url', '#');
    $blog->linkedin_url = $request->input('linkedin_url', '#');
    $blog->twitter_url = $request->input('twitter_url', '#');

    // Handle extra fields
    $datas = [];
    foreach ($blogType[4] as $input) {
        if ($input[0] == 'file' && $request->hasFile($input[1])) {
            $file = $request->file($input[1]);
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('blog_files'), $fileName);
            $datas[$input[1]] = $fileName;
        } else {
            $datas[$input[1]] = $request->input($input[1], '');
        }
    }

    $blog->extra = json_encode($datas);

    $blog->save();

    return redirect()->route('admin.blogs.edit', ['blog' => $blog->id, 'type' => $type])->with('success', $blogType[1] . ' updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index', ['type' => $blog->type])->with('success', 'Product deleted successfully.');
    }
}
