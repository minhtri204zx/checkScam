<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
  use HasFactory;

  protected $fillable = ['id', 'account_id', 'comment_id', 'post_id', 'comment_content'];

  public function account()
  {
    return $this->belongsTo(Account::class);
  }

  public function replies()
  {

    return $this->hasMany(Comment::class);
  }

  public function getnumberAttribute()
  {

    return $this->replies()->count();
  }

  public function count($id)
  {
    $count = Comment::where('post_id', $id)
      ->where('comment_id', NULL)
      ->get()
      ->count();

    return $count;
  }

  public function getLikeAttribute()
  {
    
    return $this->hasMany(Like::class)->count();
  }
  
  public function likes(){

    return $this->hasMany(Like::class)->get();
  }

  public function post(){
    return $this->belongsTo(Post::class);
  }

  public function getCheckAttribute()
  {
    $likes = 0;
    foreach($this->likes() as $like){
      if ($like->post_id==$this->post->id && $like->account_id == $this->account->id) {
        $likes =1;
        break;
      }
    }
    return $likes;
  }
}
