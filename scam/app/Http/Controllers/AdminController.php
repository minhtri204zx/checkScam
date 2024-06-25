<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Post;
use App\Models\Notification;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->except('page');
        $reports = Post::where($data)
            ->orderBy('created_at', 'desc')
            ->paginate(16);
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
                'user' => Auth::user(),
                'reports' => $reports,
                'statuses' => $statuses,
                'categories' => $categories,
                'currentStatus' => $currentStatus,
                'noti' => $noti,
                'reportNotVerifi' => $reportNotVerifi
            ]
        );
    }

    public function update($id, Request $request)
    {

        Post::where('id', $id)
            ->update([
                'status_id' => $request->status_id
            ]);

        return back();
    }

    public function updateAccounts($id, Request $request)
    {
        $accounts = Account::firstOrFail('id',$id);
        $accounts->update([
            'ban' => $request->ban
        ]);

        return back();
    }

    public function indexAccounts()
    {
        $reportNotVerifi = Post::where('status_id', 1)->count();
        $reports = Post::paginate(1);
        $user = Auth::user();
        $noti = Notification::select('noti', 'number')->first(1);
        $accounts = Account::paginate(16);

        return view('admin.accounts.index', compact('accounts', 'noti', 'user', 'reports', 'reportNotVerifi'));
    }
}
