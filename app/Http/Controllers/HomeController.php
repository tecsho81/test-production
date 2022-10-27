<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 車両表示（在庫あり・登録日時最新5件）
        $items = Item::where('status', 'active')->orderBy('created_at', 'desc')->take(5)->get();
        $type = Item::TYPE;
        return view('home', compact('items', 'type'));
    }
}
