<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\Permission;


class AssignPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.assignpermission.index', [
            'roles' => Role::orderBy('created_at', 'desc')->get(),
            'permissions' => Permission::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
