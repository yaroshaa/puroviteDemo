<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public $lang;

    public function __construct()
    {
        $this->lang = App::currentLocale();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->path();

        return view('layouts.homeApp')->with([
            'title' => 'Home',
            'home' => true
        ]);

    }
}

