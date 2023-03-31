<?php

namespace App\Http\Middleware;

use App\Models\Language;
use App\Models\Settings;
use Closure;

class CheckIssetParam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty($request->route('key'))) {
            $lang_id = Settings::first()->default_lang_id;
            $key = Language::find((integer)$lang_id)->key;
            return redirect()->route('home',['key' => $key]);
        } else {
            return $next($request);
        }
    }
}
