<?php

namespace App\Http\Controllers;

use App\Models\trader;
use Illuminate\Http\Request;

class TraderController extends Controller
{
  public function index()
  {
    $traders = trader::get();

    return view('trader.index', compact('traders'));
  }

  public function show(int $id)
  {
    $trader = Trader::where('id', $id)->FirstOrFail();
    
    return view('trader.show', compact('trader'));
  }
}
