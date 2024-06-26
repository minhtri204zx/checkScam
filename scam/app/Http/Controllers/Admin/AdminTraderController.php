<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTraderRequest;
use App\Models\Category;
use App\Models\Trader;
use Illuminate\Http\Request;

class AdminTraderController extends Controller
{
    public function index(Request $request)
    {
        $traders = Trader::paginate(4);
        if (isset($request->page)) {
            if ($request->page >= (ceil($traders->total() / $traders->perPage()) + 1)) {
                abort(404);
            }
        }

        return view("admin.traders.index", compact("traders"));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.traders.create', compact('categories'));
    }

    public function store(StoreTraderRequest $request)
    {
        $file = $request->file('img');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('/images/traders/'), $fileName);
        $trader = Trader::create([
            'img' => $fileName,
            'zalo' => $request->zalo,
            'describe' => $request->describe,
            'bank' => $request->bank,
            'active' => $request->active,
            'fullname' => $request->fullname,
            'number_bank' => $request->number_bank,
        ]);

        return back()->with('success', '0');
    }

}
