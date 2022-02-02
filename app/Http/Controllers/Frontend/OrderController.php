<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->where('user_id', Auth::id())->get();

        return view('user.order.index', compact('orders'));
    }


    public function view($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();

        return view('user.order.view', compact('orders'));
    }
}
