<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
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
        if(Order::where('id', $id)->where('user_id', Auth::id())->exists())
        {
            $payment_bank = Payment::latest()->where('kategorie', '0')->get();
            $payment_ewallet = Payment::latest()->where('kategorie', '1')->get();
            $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();

            return view('user.order.view', compact('orders', 'payment_bank', 'payment_ewallet'));
        } else {

            toast('Link Tidak dapat Ditemukan','error');
            return back();
        }


    }
}
