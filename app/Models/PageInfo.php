<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageInfo extends Model
{
    use HasFactory;
    protected $table = 'page_info';

    protected $fillable = [
        'language_id',
        'page_id',
        'name',
        'tags',
        'meta_keys',
        'meta_description'
    ];
}
