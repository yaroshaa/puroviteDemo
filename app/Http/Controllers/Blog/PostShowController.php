<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogContentResource;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Services\LocaleService;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    private BlogRepositoryInterface $blogRepository;
    private LocaleService $service;

    public function __construct(BlogRepositoryInterface $blogRepository, LocaleService $service)
    {
        $this->blogRepository = $blogRepository;
        $this->service = $service;
    }
    public function __invoke(Request $request, $id, $key = null)
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
}
