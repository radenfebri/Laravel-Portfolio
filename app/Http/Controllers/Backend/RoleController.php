<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role as ModelsRole;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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



    public function store()
    {
        request()->validate([
            'name' => 'required|string|min:2',
        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        toast('Data Berhasil ditambahkan','success');

        return back();
    }



    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'submit' => 'Update'
        ]);
    }



    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required|string|min:2',
        ]);

        $role->update([
            'name' => request('name'),
            'guard_name' => request('gurad_name') ?? 'web'
        ]);

        toast('Data Role Berhasil diupdate','info');

        return redirect()->route('role.index');
    }



    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        toast('Data Berhasil duhapus','success');

        return redirect()->route('role.index');
    }


    public function trash()
    {
        $roles = 
        return view('admin.roles.trash', compact('roles'));
    }


}
