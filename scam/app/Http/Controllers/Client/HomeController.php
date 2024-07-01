<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $comments = Comment::take(10)
            ->orderBy('created_at', 'desc')
            ->get();
        $posts = Post::take(12)
            ->orderBy('id', 'desc')
            ->where('status_id', 3)
            ->get();
        $communities = Community::take(12)
            ->orderBy('id', 'desc')
            ->get();

        $banners = Banner::where('status', 'on')
            ->get();

        return view('home', compact('comments', 'posts', 'communities', 'banners'));
    }
}
