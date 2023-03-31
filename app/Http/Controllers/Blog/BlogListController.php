<?php
namespace App\Http\Controllers\Blog;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Services\LocaleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    private BlogRepositoryInterface $blogRepository;
    private LocaleService $service;

    public function __construct(BlogRepositoryInterface $blogRepository, LocaleService $service)
    {
        $this->blogRepository = $blogRepository;
        $this->service = $service;
    }


    /**
     * @param Blog $blog
     * @param Request $request
     * @param null $key
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(Blog $blog, Request $request, $key = null)
    {
        $data = $this->blogRepository->getPosts($this->service->getLanguageId($key));

        return view('blog.blogList')
            ->with(['data' => $data->toArray()]);
    }
}
