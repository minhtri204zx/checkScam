<?php

namespace App\Http\Middleware;

use App\Models\Category;
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
                'image' => 'data:image/png;base64,'.base64_encode($content),
            ];
        }
        View::share('cates', $arr);
        return $next($request);
    }
}
