<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles =  Role::orderBy('created_at', 'desc')->get();
        $role = new Role;

        return view('admin.roles.index', compact('roles', 'role'));
    }
}
