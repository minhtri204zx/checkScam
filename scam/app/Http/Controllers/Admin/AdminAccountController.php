<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminAccount;
use App\Models\Account;
use App\Models\Notification;
use App\Models\Post;
use Auth;
use Hash;
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

    public function create()
    {

        return view('admin.accounts.create');
    }

    public function store(StoreAdminAccount $request)
    {
        Account::create([
            'email' => $request->name,
            'password' => Hash::make($request->pass),
            'avatar' => 'https://graph.facebook.com/v3.3/753383010325459/picture',
            'name' => $request->fullname,
            'role_id' => 2
        ]);

        return back()->with('success', '1');
    }


}
