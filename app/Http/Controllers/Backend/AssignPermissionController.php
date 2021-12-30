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


    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        toast('Data Berhasil Ditambahkan','success');

        return back();
    }


    public function edit(Role $role)
    {
        return view('admin.assignpermission.edit', [
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }


    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array',
        ]);

        $role->syncPermissions(request('permissions'));

        toast('Data Berhasil Diupdate','info');

        return redirect()->route('assignpermission.index');

    }
}
