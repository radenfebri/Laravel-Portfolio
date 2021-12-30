<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->get();
        $permission = new Permission;

        return view('admin.permission.index', compact('permissions', 'permission'));
    }



    public function store()
    {
        request()->validate([
            'name' => 'required|string|unique:permissions,name|min:2',
        ]);

       Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        toast('Data Berhasil Ditambahkan','success');

        return back();
    }



    public function edit(Permission $Permission)
    {
        return view('admin.permission.edit', [
            'permission' => $Permission,
            'submit' => 'Update'
        ]);
    }



    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required|string|min:2',
        ]);

        $permission->update([
            'name' => request('name'),
            'guard_name' => request('gurad_name') ?? 'web'
        ]);

        toast('DataPermission Berhasil Diupdate','info');

        return redirect()->route('permission.index');
    }



    public function destroy($id)
    {
        $permission =Permission::find($id);
        $permission->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('permission.index');
    }


    public function trash()
    {
        $permissions =Permission::onlyTrashed()->get();
        return view('admin.permission.trash', compact('permissions'));
    }


    public function restore($id = null)
    {
        if($id !=null) {
            $id =Permission::onlyTrashed()->where('id' , $id)->restore();
        } else {
            $id =Permission::onlyTrashed()->restore();
        }

        toast('Data Berhasil Direstore Semua','success');
        return back();
    }


    public function delete($id = null)
    {
        if($id !=null) {
            $id =Permission::onlyTrashed()->where('id' , $id)->forceDelete();
        } else {
            $id =Permission::onlyTrashed()->forceDelete();
        }

        toast('Data Berhasil Dihapus Permanen','success');
        return back();
    }
}
