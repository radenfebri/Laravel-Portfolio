<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        abort_if(Gate::denies('role-index'), Response::HTTP_FORBIDDEN, 'Forbidden');

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
        abort_if(Gate::denies('role-edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

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
        abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $role = Role::find($id);
        $role->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('role.index');
    }


    public function trash()
    {
        abort_if(Gate::denies('role-trash'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $roles = Role::onlyTrashed()->get();
        return view('admin.roles.trash', compact('roles'));
    }


    public function restore($id = null)
    {
        abort_if(Gate::denies('role-restore'), Response::HTTP_FORBIDDEN, 'Forbidden');

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
        abort_if(Gate::denies('role-delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if($id !=null) {
            $id = Role::onlyTrashed()->where('id' , $id)->forceDelete();
        } else {
            $id = Role::onlyTrashed()->forceDelete();
        }

        toast('Data Berhasil Dihapus Permanen','success');
        return back();
    }


}
