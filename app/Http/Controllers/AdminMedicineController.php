<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Medicine;
use Illuminate\Http\Request;

class AdminMedicineController extends Controller
{
    //
    public function index()
    {
        $medicines = Medicine::with(['categories', 'manufacturer'])->orderBy('id', 'desc')->get();

        return view('admin.medicines', compact('medicines'));
    }

    public function show()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('admin.new-medicine', compact('categories', 'manufacturers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'm_name' => 'required',
            'm_description' => 'required',
            'm_price' => 'required',
            'm_quantity' => 'required',
            'manufacturer_id' => 'required',
            'm_status' => 'required',
            'categories' => 'required',
            'image' => 'required|image',
        ]);

        // $imagePath = $request->file('image')->store('medicines', 'public');

        $medicine = new Medicine();
        $medicine->m_name = $request->m_name;
        $name_slug = str_replace(' ', '-', $request->m_name);
        $medicine->m_slug = $name_slug;
        $medicine->m_description = $request->m_description;
        $medicine->m_price = $request->m_price;
        $medicine->m_quantity = $request->m_quantity;
        $medicine->manufacturer_id = $request->manufacturer_id;
        $medicine->m_status = $request->m_status;
        $medicine->save();

        $medicine_id = $medicine->id;
        $extension = $request->file('image')->getClientOriginalExtension();
        $newFilename = 'medicine-'.$medicine_id.'.'.$extension;

        $imagePath = $request->file('image')->storeAs('medicines', $newFilename, 'public');

        $medicine->m_image = $imagePath;
        $medicine->save();

        $medicine->categories()->attach($request->categories);

        return redirect()->route('admin.medicines');
    }

    public function edit($id)
    {
        $medicine = Medicine::with(['categories', 'manufacturer'])->find($id);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('admin.medicine.edit-medicine', compact('medicine', 'categories', 'manufacturers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'm_name' => 'required',
            'm_description' => 'required',
            'm_price' => 'required',
            'm_quantity' => 'required',
            'manufacturer_id' => 'required',
            'm_status' => 'required',
            'categories' => 'required',
        ]);

        $medicine = Medicine::findOrfail($id);
        $medicine->m_name = $request->m_name;
        $name_slug = str_replace(' ', '-', $request->m_name);
        $medicine->m_slug = $name_slug;
        $medicine->m_description = $request->m_description;
        $medicine->m_price = $request->m_price;
        $medicine->m_quantity = $request->m_quantity;
        $medicine->manufacturer_id = $request->manufacturer_id;
        $medicine->m_status = $request->m_status;
        $medicine->save();

        $medicine_id = $medicine->id;
        $extension = $request->file('image')->getClientOriginalExtension();
        $newFilename = 'medicine-'.$medicine_id.'.'.$extension;

        $imagePath = $request->file('image')->storeAs('medicines', $newFilename, 'public');

        $medicine->m_image = $imagePath;
        $medicine->save();

        $medicine->categories()->sync($request->categories);

        return redirect()->route('admin.medicines');
    }
}
