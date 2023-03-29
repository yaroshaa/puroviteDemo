<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\Language;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $language_id = 1;
        $posts = Blog::all();

        return view('blog.blogList')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $languages = Language::all();
        return view('blog.create')->with(['languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'content' => ['required'],
            'meta_keys' => ['required'],
            'meta_description' => ['required'],
        ]);

        $post = Blog::create();
        BlogContent::create([
            'blog_id' => $post->id,
            'language_id' => $request->language_id,
            'name' => $request->name,
            'content' => $request->input('content'),
            'meta_keys' => $request->inputmeta_keys,
            'meta_description' => $request->meta_description,
            'image' => $request->image,
            'status' => true
        ]);


        return redirect()->route('blog.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
//        dd($blog);
        return view('blog.post')->with([
            'title' => 'Title',
            'meta_keys' => 'Post',
            'meta_description' => 'Post',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
