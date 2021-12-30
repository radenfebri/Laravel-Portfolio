<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AssignRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $roles = Role::get();
        $users = User::has('roles')->get();
        $usersall = User::get();

        return view('admin.assignrole.index', compact('roles', 'users', 'usersall'));
    }
}
