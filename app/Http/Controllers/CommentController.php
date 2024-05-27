<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        Comment::create([
            'account_id' => Auth::id(),
            'comment_id' => $request->reply ? $request->reply : NULL,
            'post_id' => $request->post,
            'comment_content' => $request->comment
        ]);

        Account::where('id', Auth::id())
            ->update([
                'numcomments' => $request->numcomments - 1,
            ]);
        return back();
    }

    public function like(int $id)
    {
        $comment = Comment::findOrFail($id);

        Like::create([
            'account_id'=> Auth::id(),
            'post_id'=> $comment->post_id,
            'comment_id'=>$id
        ]);
        return back();
    }

    public function unlike(int $id)
    {
        $comment = Comment::findOrFail($id);

       Like::where('post_id', $comment->post_id)
       ->where('account_id', Auth::id())
       ->delete();
        return back();
    }
}
