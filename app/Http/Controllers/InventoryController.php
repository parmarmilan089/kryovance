<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;

class InventoryController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::with('category')->get();
        $data = [];
        $data['title'] = 'Inventroy List';
        $data['menu_active_tab'] = 'inventroy-list';
        $data['inventories'] = $inventories;
        return view('admin.inventory.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $data['title'] = 'Inventory Create';
        $data['menu_active_tab'] = 'Inventory-create';
        $data['categories'] = $categories;
        return view('admin.inventory.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'model_name' => 'required|string',
            'qty' => 'required|integer|min:1',
            'category_id' => 'required|exists:category,id',
        ]);
    
        Inventory::create($request->only('model_name', 'qty', 'category_id'));
    
        return redirect()->route('inventories.index')->with('success', 'Inventory item added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $categories = Category::all(); // if you're showing categories in dropdown
        $data = [];
        $data['title'] = 'Inventroy Edit';
        $data['menu_active_tab'] = 'inventroy-edit';
        $data['inventory'] = $inventory;
        $data['categories'] = $categories;
        return view('admin.inventory.edit')->with($data);
    }
    
    public function getByCategory($id)
    {
        $inventories = Inventory::where('category_id', $id)->get();
        return response()->json($inventories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inventory = Inventory::findOrFail($id);

        $request->validate([
            'model_name' => 'required',
            'qty' => 'required|numeric',
            'category_id' => 'required|exists:category,id',
        ]);
    
        $inventory->update($request->all());
    
        return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
    
        return redirect()->route('inventories.index')->with('success', 'Inventory deleted successfully.');
    }
}
