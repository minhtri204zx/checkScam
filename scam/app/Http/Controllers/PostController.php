<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Jobs\CheckViewer;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Post;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function create()
    {
        $account = Account::where('id', Auth::id())->get();

        return view('report.create', compact('account'));
    }

    public function store(ReportRequest $request)
    {
        $images = json_encode($request->image);
        Post::create([
            'images' => $images,
            'category_id' => $request->danhmuc,
            'username' => $request->username,
            'uid' => $request->uid,
            'linkfb' => $request->link,
            'fullname' => $request->hovaten,
            'numberphone' => $request->sodienthoai,
            'numberbank' => $request->sotaikhoan,
            'namebank' => $request->nganhang,
            'content' => $request->noidung,
            'status' => $request->status,
            'account_id' => Auth::id(),
        ]);

        $noti = Notification::firstOrFail(1);
        if ($noti) {
            Notification::where('id', $noti->id)
                ->update([
                    'number' => $noti->number + 1,
                ]);
        } else {
            Notification::create([
                'noti' => 'Bài viết mới',
                'number' => 1
            ]);
        }


        return back()->with('success', '1');
    }

    public function show(int $id, Request $request)
    {
        $post = Post::findOrFail($id);

        if (Auth::check()) {
            $account = Account::where('id', Auth::id())->first();
        } else {
            $account = ['numcomments' => 3];
        }
        $data = [
            'device' => $request->header('Sec-Ch-Ua-Mobile') == '?0' ? "Computer" : "Mobile",
            'platform' => $request->header('Sec-Ch-Ua-Platform'),
        ];
        if ($post->status_id != 3) {
            if (Auth::user()->role_id == 2) {
                return view('report.show', compact('post', 'account'));
            } else {
                abort(404);
            }
        }
        CheckViewer::dispatch($data, $id);
        return view('report.show', compact('post', 'account'));
    }

    public function index(Request $request)
    {
        if (isset($request->search) || isset($request->cate)) {
            if (isset($request->search)) {
                $posts = Post::take(12)
                    ->where('fullname', $request->search)
                    ->where('status_id', 3)
                    ->orderBy('id', 'desc')
                    ->get();
            } else if (isset($request->cate)) {
                $posts = Post::take(12)
                    ->where('category_id', $request->cate)
                    ->where('status_id', 3)
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $posts = Post::take(12)
                    ->where('category_id', $request->cate)
                    ->where('fullname', $request->search)
                    ->where('status_id', 3)
                    ->orderBy('id', 'desc')
                    ->get();
            }
        } else {
            $posts = Post::take(12)
                ->orderBy('id', 'desc')
                ->where('status_id', 3)
                ->get();
        }

        return view('report.index', compact('posts'));
    }

    public function loadMore(Request $request)
    {

        $offset = $request->offset;
        if ($request->screen <= 1974) {
            $post = 7;
        } else {
            $post = 13;
        }
        if (isset($request->search) && $request->search != null) {
            $posts = Post::skip($post - 1)
                ->take($post)
                ->where('fullname', 'Nguyễn Minh Trí')
                ->where('status_id', 3)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $posts = Post::skip($offset)
                ->orderBy('id', 'desc')
                ->where('status_id', 3)
                ->take($post)
                ->get();
        }
        foreach ($posts as $post) {
            $post = $posts->map(function ($post) {
                $post->views = $post->views($post->id);
                return $post;
            });
        }

        return response()->json($posts);
    }

    public function search(Request $request)
    {
        $query = $request->search;

        $posts = Post::search($query)
            ->take(7)
            ->get()
            ->toArray();

        return response()->json($posts);
    }
}
