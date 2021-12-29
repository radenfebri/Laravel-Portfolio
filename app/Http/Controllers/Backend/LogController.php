<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $log = Log::all();
        $user = User::all();
        return view('admin.log.log', compact('log', 'user'));
    }
}
