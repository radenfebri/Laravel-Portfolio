<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // return view ('admin.dashboard');
        if (Auth::user()->hasRole('Super Admin')) {
            return view('admin.dashboard');
       } elseif (Auth::user()->hasRole('Admin')) {
           return view('admin.dashboard');
       } else {
           return view('home');
       }
    }
}
