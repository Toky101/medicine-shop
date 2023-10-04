<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(): View
    {
        $categories = Category::all();

        return view('auth.login', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            if (auth()->user()->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->with('danger', 'Invalid credentials');
        // return redirect()->intended('/');
    }
}
