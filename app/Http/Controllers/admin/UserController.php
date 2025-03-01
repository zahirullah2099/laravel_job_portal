<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function index(){
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.users.list', [
            'users' => $users
        ]);
    }
}
