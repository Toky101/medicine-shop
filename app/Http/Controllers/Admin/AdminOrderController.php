<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::has('orderitems')->orderBy('created_at', 'desc')->get();
        $statuses = ['pending' => 'Pending', 'processing' => 'Processing', 'completed' => 'Completed', 'cancelled' => 'Cancelled'];

        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    public function update(Request $request, $id)
    {

        $order = Order::find($id);
        $order->o_status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}
