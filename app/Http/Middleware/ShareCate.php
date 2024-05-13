<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareCate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $arr = [];
        $cates = Category::get();
        foreach ($cates as $cate) {
            $content = file_get_contents(public_path() . "/images/games/$cate->image");
            $arr[] = [
                'name' => $cate['name'],
                'image' => 'data:image/png;base64,' . base64_encode($content),
            ];
        }
        View::share('cates', $arr);
        View::share('posts', Post::take(12)
            ->orderBy('created_at', 'desc')
            ->get());

        View::share('comments', Comment::take(10)
            ->leftJoin('accounts','comments.account_id','=','accounts.id')
            ->leftJoin('posts','comments.post_id','=','posts.id')
            ->orderBy('posts.created_at', 'desc')
            ->get());
        return $next($request);
    }
}
