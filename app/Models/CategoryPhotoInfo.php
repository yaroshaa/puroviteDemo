<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPhotoInfo extends Model
{
    use HasFactory;
    protected $table = 'category_photo_info';

    protected $fillable = [
        'language_id',
        'category_photo_id',
        'name',
        'description',
        'meta_keys',
        'meta_description'
    ];

}
