<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Notification;
use App\Models\Viewer;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->except('page');
        $reports = Post::where($data)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        if (isset($request->page)) {
            if ($request->page > (ceil($reports->total() / $reports->perPage()) + 1)) {
                abort(404);
            }
        }
        $reportNotVerifi = Post::where('status_id', 1)->count();
        $statuses = Post::select('status')
            ->distinct('status')
            ->get();
        $categories = Post::select('category_id')
            ->distinct('category_id')
            ->get();
        $currentStatus = Post::select('status_id')
            ->distinct('status_id')
            ->get();
        $noti = Notification::select('noti', 'number')->first(1);

        return view(
            "admin.reports.index",
            [
                'reports' => $reports,
                'statuses' => $statuses,
                'categories' => $categories,
                'currentStatus' => $currentStatus,
                'noti' => $noti,
                'reportNotVerifi' => $reportNotVerifi
            ]
        );
    }

    public function create(Request $request)
    {
        $categories = Category::all();

        return view('admin.reports.create', compact('categories'));
    }

    public function store(Request $request)
    {

        return back()->with('success', '1');
    }

    public function update($id, Request $request)
    {
        Post::where('id', $id)
            ->update([
                'status_id' => $request->status_id
            ]);

        return back();
    }

    public function destroy($id, Request $request)
    {
        Post::where('id', $id)->delete();
        if (str::contains($request->fullUrl(), 'admin-reports')) {

            return redirect('/admin-reports');
        }

        return back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.reports.show', compact('post'));
    }
}
