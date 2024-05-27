<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
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
            ->get();



        return view('home', compact('comments','posts'));
    }
}
