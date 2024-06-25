<?php

namespace App\Http\Controllers;

use App\Models\trader;
use Illuminate\Http\Request;

class TraderController extends Controller
{
  public function index()
  {
    $traders = trader::take(18)->get();

    return view('trader.index', compact('traders'));
  }

  public function show(int $id)
  {
    $trader = Trader::where('id', $id)->FirstOrFail();

    return view('trader.show', compact('trader'));
  }

  public function loadMore(Request $request){
    $offset = $request->offset;

        $posts = Trader::skip($offset)
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();

    return response()->json($posts);

  }
}
