<?php

namespace App\Services;

use App\Models\Language;
use Illuminate\Support\Facades\App;

class LocaleService
{
    public function getLanguageId($key = null): int
    {
        return isset($key)
            ? (integer) Language::where('key', $key)->first()->id
            : (integer) Language::where('key', config("app.locale"))->first()->id;
    }

    public function setLang(string $key = null): void
    {
         isset($key)
            ? App::setLocale($key)
            : App::setLocale(config("app.locale"));
    }

}
