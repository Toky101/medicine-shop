<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        //
        $totalMedicines = Medicine::count();
        $totalUsers = User::count();
        $totalOrders = Order::count();

        return view('admin.a_dashboard', compact('totalMedicines', 'totalUsers', 'totalOrders'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
