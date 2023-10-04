<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {

        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $user_id = auth()->user()->id;
        $user_cart = CartItem::where('user_id', $user_id)->get();
        $total_price = 0;
        foreach ($user_cart as $cart_item) {
            $total_price += $cart_item->subtotal;
        }

        return view('checkout.index', compact('user_cart', 'total_price'));
    }

    public function store(Request $request)
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required',
        ]);
        $user_id = $request->input('user_id');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $payment_method = $request->input('payment_method');
        $payment_status = 'pending';
        $order_status = 'pending';

        $medicine_ids = $request->input('medicine_ids');
        $prices = $request->input('prices');
        $quantities = $request->input('quantities');
        $totalPrice = 0;

        if (! is_array($medicine_ids)) {
            return redirect()->route('home')->with('danger', 'Please add some medicines to cart');
        }
        $order = Order::create([
            'user_id' => $user_id,
            'o_address' => $address,
            'o_phone' => $phone,
            'o_payment_method' => $payment_method,
            'o_payment_status' => $payment_status,
            'o_status' => $order_status,
        ]);

        $order_id = $order->id;

        foreach ($medicine_ids as $key => $productId) {
            $price = $prices[$key];
            $quantity = $quantities[$key];
            $medicine_id = $medicine_ids[$key];
            $totalPrice += $price * $quantity;

            OrderItem::create([
                'order_id' => $order_id,
                'medicine_id' => $medicine_id,
                'price' => $price,
                'quantity' => $quantity,
            ]);
            CartItem::where('user_id', $user_id)->where('medicine_id', $medicine_id)->delete();
        }
        Order::where('id', $order_id)->update([
            'o_total_price' => $totalPrice,
        ]);

        return redirect()->route('dashboard')->with('success', 'Order placed successfully');
    }
}
