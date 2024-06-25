<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;

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
        'account_id',
        'status_id'
    ];

    public function views($id)
    {
        return $this->hasMany(Viewer::class)->where('post_id', $id)->count();
    }

    public function current_status()
    {
        return $this->belongsTo(Status::class, 'status_id');
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

    public function toSearchableArray() : Array
{
    return array_merge($this->toArray(),[
        'id' => (string) $this->id,
        'model' => $this->model,
        'created_at' => $this->created_at->timestamp,
    ]);
}

}
