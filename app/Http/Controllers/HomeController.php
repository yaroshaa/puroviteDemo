<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public string $lang;
    public int $default_lang_id;

    public function __construct()
    {
        $this->lang = App::currentLocale();
        $locale_key = config("app.locale");
        $this->default_lang_id = Language::where('key', $locale_key)->first()->id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($lang_key = null)
    {
        $lang_id = isset($lang_key)
            ? Language::where('key', $lang_key)->first()->id
            : $this->default_lang_id;

        $current_lang_key = Language::where('id', $lang_id)->first()->key;

        App::setLocale($current_lang_key);

        return view('pages.home')->with([
            'title' => 'Home',
            'home' => true
        ]);

    }
}

