<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;
    protected $table = 'page_content';

    protected $fillable = [
        'language_id',
        'page_id',
        'title',
        'content',
        'image',
        'status'
    ];
}
