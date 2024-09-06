<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::all();
        return view('inventory.index', compact('inventoryItems'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        Inventory::create($validatedData);

        return redirect()->route('inventory.index')->with('success', 'Инвентарь успешно создан.');
    }

    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        $inventory->update($validatedData);

        return redirect()->route('inventory.index')->with('success', 'Инвентарь успешно обновлен.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Инвентарь успешно удален.');
    }
}
