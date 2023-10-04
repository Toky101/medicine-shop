<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        //
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $user_id = auth()->user()->id;
        $user_orders = Order::where('user_id', $user_id)->get();

        return view('dashboard', compact('user_orders'));
    }
}
