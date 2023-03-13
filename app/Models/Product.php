<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'mpn',
        'sku',
        'ean',
        'name',
        'description',
        'images',
        'tags',
        'language_id'
    ];

}
