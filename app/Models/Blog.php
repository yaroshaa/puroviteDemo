<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'language_id',
        'categories_blog_id',
        'name',
        'content',
        'meta_keys',
        'meta_description',
        'image',
        'status'
    ];
}
