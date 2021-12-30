<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            'name' => 'required|string|unique:roles,name|min:2',
        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        toast('Data Berhasil Ditambahkan','success');

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

        toast('Data Role Berhasil Diupdate','info');

        return redirect()->route('role.index');
    }



    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('role.index');
    }


    public function trash()
    {
        $roles = Role::onlyTrashed()->get();
        return view('admin.roles.trash', compact('roles'));
    }


    public function restore($id = null)
    {
        if($id !=null) {
            $id = Role::onlyTrashed()->where('id' , $id)->restore();
        } else {
            $id = Role::onlyTrashed()->restore();
        }

        toast('Data Berhasil Direstore Semua','success');
        return back();
    }


    public function delete($id = null)
    {
        if($id !=null) {
            $id = Role::onlyTrashed()->where('id' , $id)->forceDelete();
        } else {
            $id = Role::onlyTrashed()->forceDelete();
        }

        toast('Data Berhasil Dihapus Permanen','success');
        return back();
    }


}
