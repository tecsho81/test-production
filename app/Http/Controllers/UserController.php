<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
    * ユーザー一覧
    *
    * @param Request $request
    * @return Response
    */
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return view('users.index', [
            'users' => $users,
        ]);
    }
}
