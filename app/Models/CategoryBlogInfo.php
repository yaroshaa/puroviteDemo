<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlogInfo extends Model
{
    use HasFactory;

    protected $table = 'category_blog_info';

    protected $fillable = [
        'categories_blog_id',
        'language_id',
        'name',
        'description',
        'meta_keys',
        'meta_description'
    ];
}
