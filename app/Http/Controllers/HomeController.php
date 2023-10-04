<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $medicines = Medicine::with(['categories', 'manufacturer'])->get();
        $category_id = 1;
        $category_medicines = Medicine::whereHas('categories', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->orderBy('created_at', 'desc')->get()->take(4);

        $category_medicine_name = Category::where('id', $category_id)->first();

        // $categories = Category::all();

        return view('home', compact('medicines', 'category_medicines', 'category_medicine_name'));
    }
}
