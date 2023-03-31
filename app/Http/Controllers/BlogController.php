<?php

namespace App\Http\Controllers;

use App\Http\Resources\Blog\BlogContentResource;
use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\Language;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Services\LocaleService;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    private BlogRepositoryInterface $blogRepository;
    private LocaleService $service;

    public function __construct(BlogRepositoryInterface $blogRepository, LocaleService $service)
    {
        $this->blogRepository = $blogRepository;
        $this->service = $service;
    }
    /**
     */
    public function index($key = null)
    {
        $data = $this->blogRepository->getPosts($this->service->getLanguageId($key));
        return view('blog.blogList')
            ->with(['data' => $data->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();

        return view('blog.blogCreate')->with(['languages' => $languages]);
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


        return redirect()->route('blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id, $key = null)
    {
        $repository = $this->blogRepository->getPost((int)$id, $this->service->getLanguageId($key));
        $blogContentResource = new BlogContentResource();
        $post = [];
        foreach ($repository as $data){
            $post =  $blogContentResource ->toArray($data);
        }

        return view('blog.post')
            ->with(['data' => $post]);
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
    public function delete(Blog $blog)
    {
        //
    }
}
