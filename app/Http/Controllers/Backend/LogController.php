<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        Session::put('user', $user);
        $user=Session::get('user');
        $log = Log::all();

        if (Auth::check()) {
            $user = User::where('name', Auth::id())->get();

            // $user = Auth::user()->name;
        } else {
            $user = Auth::user()->name;

        }


        return view('admin.log.log', compact('log', 'user'));
    }
}
