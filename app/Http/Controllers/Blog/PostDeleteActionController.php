<?php

namespace App\Http\Controllers\Blog;

//use Illuminate\Http\JsonResponse;
use App\Repositories\BlogRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Http\Resources\Blog\BlogResource;

class PostDeleteActionController extends Controller
{
    public function __invoke()
    {
        return 'ok';
    }
}
