<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'status'
    ];

    protected $with = [
        'content',
    ];

    /**
     * @return HasMany
     */
    public function content(): HasMany
    {
        return $this->hasMany(BlogContent::class);
    }

//    /**
//     * @return HasMany
//     */
//    public function comments(): HasMany
//    {
//        return $this->hasMany(Comment::class);
//    }
}
