<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'username',
        'uid',
        'linkfb',
        'fullname',
        'numberphone',
        'numberbank',
        'namebank',
        'content',
        'status',
        'images',
        'account_id'
    ];
}
