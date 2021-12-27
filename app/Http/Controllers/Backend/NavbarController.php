<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class NavbarController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.dashboard', compact('roles'));
    }
}
