<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        /*
        in order to use pagination style of bootstrap,
        add following line into boot() in AppServiceProvider.php
        Paginator::useBootstrap();
         */

        $users = User::users()->latest()->paginate(10);
        return view('admin.users.index',compact('users'));
    }
}
