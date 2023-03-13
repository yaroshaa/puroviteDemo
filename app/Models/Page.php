<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'key',
        'nav',
        'status'
    ];
    protected $with = [
        'info', 'content'
    ];


    public function info()
    {
        $lang = Language::where('key',App::currentLocale())->first();
        return $this->hasOne(PageInfo::class)->where('language_id', $lang->id);
    }

    public function content()
    {
        $lang = Language::where('key',App::currentLocale())->first();
        return $this->hasMany(PageContent::class)->where('language_id', $lang->id);
    }
}
