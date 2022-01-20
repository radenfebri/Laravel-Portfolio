<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $orders = Order::where('status', '0')->orderBy('created_at', 'desc')->get();

        return view('admin.order.index', compact('orders'));
    }


    public function show($id)
    {
        return view('admin.order.show', [
            'orders' => Order::findOrFail($id)
        ]);
    }

    public function completed()
    {
        $orders = Order::where('status', '1')->orderBy('created_at', 'desc')->get();

        return view('admin.order.completed', compact('orders'));
    }


    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();

        toast('Data Berhasil Diupdate','success');

        return redirect()->route('orders.index');
    }


    public function destroy($id)
    {
        // abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $orders = Order::find($id);
        $orders->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('orders.index');
    }

}
