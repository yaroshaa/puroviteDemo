<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPhoto extends Model
{
    use HasFactory;

    protected $table = 'categories_photos';

    protected $fillable = [
        'key',
        'status'
    ];
}
