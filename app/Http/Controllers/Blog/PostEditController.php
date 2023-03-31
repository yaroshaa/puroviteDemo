<?php
namespace App\Http\Controllers\Blog;

use App\Models\Language;
use App\Http\Controllers\Controller;

class PostEditController extends Controller
{
    public function __invoke()
    {
        $languages = Language::all();
        return view('blog.edit')->with(['languages' => $languages]);
    }
}
