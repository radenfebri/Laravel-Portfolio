<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        if (Auth::user()->hasRole('Super Admin')) {
            return view('admin.dashboard', compact('roles'));
       } elseif (Auth::user()->hasRole('Admin')) {
           return view('admin.dashboard', compact('roles'));
       } else {
           return redirect()->route('user.index');
       }
    }
}
