<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Notification;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate(16);

        return view('admin.accounts.index', compact('accounts'));
    }

    public function update($id, Request $request)
    {
        $accounts = Account::findOrFail($id);
        $accounts->update([
            'ban' => $request->ban
        ]);

        return back();
    }
}
