<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function index() {

        $users = User::paginate(2);

        return view('admin.users.index', compact('users'));

    }
}
