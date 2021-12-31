<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $roles = Role::get();
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users.index', compact('roles', 'users'));
    }


    public function create()
    {
        $users = User::all();
        return view('admin.users.create', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|string|unique:users,email|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        toast('Data Berhasil Ditambahkan','success');

        return redirect()->route('users.index');
    }



    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }



    public function update(Request $request, $user)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:191',
            // 'email' => 'required|string|unique:users|email|min:3|max:191'. auth()->id(),
        ]);

        if (empty($request->file('foto'))) {
            $user = User::find($user);
            $user->update([
                'name' => $request->name,
                // 'email' => $request->email,
            ]);

            toast('Data Berhasil Diupdate','success');

            return redirect()->route('users.index');
        } else {
            $user = User::find($user);
            Storage::delete($user->foto);
            $user->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'foto' => $request->file('foto')->store('foto-profile'),
            ]);

            toast('Data Berhasil Diupdate','success');

            return redirect()->route('users.index');
        }
    }
}
