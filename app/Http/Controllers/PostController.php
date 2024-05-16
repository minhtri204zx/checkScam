<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Account;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(){
        $account = Account::where('id',Auth::id())->get();
        return view('report.create',compact('account'));
    }

    public function store(ReportRequest $request){
        Post::create([
            'images'=> $request->image,
            'category_id'=> $request->danhmuc,
            'username' => $request->username,
            'uid'=> $request->uid,
            'linkfb'=> $request->link,
            'fullname'=>$request->hovaten,
            'numberphone'=>$request->sodienthoai,
            'numberbank'=>$request->sotaikhoan,
            'namebank'=>$request->nganhang,
            'content'=>$request->noidung,
            'status'=>$request->status,
            'account_id'=>Auth::id(),
        ]);
    }

    public function show(Request $request, int $id){
        $post = Post::where('posts.id', $id)
        ->leftJoin('categories','posts.category_id','=','categories.id')
        ->leftJoin('accounts','accounts.id','=','posts.account_id')
        ->get();
        return view('report.show',['post'=> $post]);
    }

}
