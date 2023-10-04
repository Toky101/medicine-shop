<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
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

        return view('cart.index', compact('user_cart', 'total_price'));
    }

    public function store($id, Request $request)
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }
        $user_id = auth()->user()->id;
        $medicine_id = $id;
        $quantity = $request->quantity;

        if (CartItem::where('user_id', $user_id)->where('medicine_id', $medicine_id)->exists()) {
            $cart_item = CartItem::where('user_id', $user_id)->where('medicine_id', $medicine_id)->first();
            $cart_item->c_quantity += $quantity;
            $cart_item->save();

            return back()->with('success', 'Medicine added to cart successfully');
            // return redirect()->route('cart.index');
        }

        CartItem::create([
            'user_id' => $user_id,
            'medicine_id' => $medicine_id,
            'c_quantity' => $quantity,
        ]);

        return back()->with('success', 'Medicine added to cart successfully');
        // return redirect()->route('cart.index');
    }
}
