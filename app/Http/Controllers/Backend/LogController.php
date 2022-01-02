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

        $user = Auth::user()->name;
        // $email = $user->email;

        // $dt = Carbon::now();
        // $todayDate = $dt->toDayDateTimeString();

        // $log = [
        //     'ip_address' => $name,
        //     'email' => $email,
        //     'description' => 'LOgout',
        //     'date_time' => $todayDate
        // ];

        // dd($user);
        // DB::table('logs')->insert($log);
        // Auth::logout();
        return view('admin.log.log', compact('log', 'user'));
    }
}
