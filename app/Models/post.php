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

    public function views($id)
    {
        return $this->hasMany(Viewer::class)->where('post_id', $id)->count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    } 

    public function comments(){
        return $this->hasMany(Comment::class)
        ->where('comment_id',Null)
        ->orderBy('created_at','desc');
    }

}
