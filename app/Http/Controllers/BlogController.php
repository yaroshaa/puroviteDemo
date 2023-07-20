<?php

namespace App\Http\Controllers;

use App\Http\Resources\Blog\BlogContentResource;
use App\Models\Language;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Services\LocaleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'content' => ['required'],
            'meta_keys' => ['required'],
            'meta_description' => ['required'],
        ]);

        $newContent = $this->blogRepository->storePost($request);
        if (!$newContent)
        {
            return view()->with(['error' => 'Тew post not added']);
        } else {
            if ($request->isMethod('post') && $request->image) {
                Image::make($request->file('image'))->save(public_path() . '/img/blog/'.$request->file('image')->getClientOriginalName());
            }
        }

        return redirect()->route('blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id, $key = null)
    {
        $repository = $this->blogRepository->getPost((int)$id, $this->service->getLanguageId($key));
        $blogContentResource = new BlogContentResource();
        $post = [];
        foreach ($repository as $data) {
            $post = $blogContentResource->toArray($data);
        }

        return view('blog.post')
            ->with(['data' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $key = null;
        $languages = Language::all();
        $repository = $this->blogRepository->getPost((int)$id, $this->service->getLanguageId($key));
        $blogContentResource = new BlogContentResource();
        $post = [];
        foreach ($repository as $data) {
            $post = $blogContentResource->toArray($data);
        }

        return view('blog.blogEdit')->with(['languages' => $languages, 'data' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required'],
            'content' => ['required'],
            'meta_keys' => ['required'],
            'meta_description' => ['required'],
            'image' => 'mimes:jpeg,bmp,png|max:500000'
        ]);

        $updateContent = $this->blogRepository->updatePost($request,$id);

        if (!$updateContent) {
            return view()->with(['error' => 'Тew post not added']);
        } else {
            if ($request->isMethod('post') && $request->image) {
                Image::make($request->file('image'))->save(public_path() . '/img/blog/'.$request->file('image')->getClientOriginalName());
            }
        }

        return redirect()->route('blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        $this->blogRepository->deletePost($id);

        return redirect()->route('blog');
    }
}
