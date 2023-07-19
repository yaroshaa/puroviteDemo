<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mail';

    protected $fillable = [
        'id',
        'name',
        'email',
        'message',
        'status'
    ];
}
