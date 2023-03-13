<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = [
        'name',
        'language_id',
        'description',
        'icon',
        'tags',
        'meta_keys',
        'meta_description',
        'photos',
        'categories_photos_id'
    ];
}
