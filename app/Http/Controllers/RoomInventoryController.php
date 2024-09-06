<?php

namespace App\Http\Controllers;

use App\Models\RoomInventory;
use App\Models\Room;
use App\Models\Inventory;
use Illuminate\Http\Request;

class RoomInventoryController extends Controller
{
    public function index()
    {
        $roomInventories = RoomInventory::all();
        return view('room_inventory.index', compact('roomInventories'));
    }

    public function create()
    {
        $rooms = Room::all();
        $inventories = Inventory::all();
        return view('room_inventory.create', compact('rooms', 'inventories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'inventory_id' => 'required|exists:inventory,id',
            'quantity' => 'required|integer',
        ]);

        RoomInventory::create($validatedData);

        return redirect()->route('room_inventory.index')->with('success', 'Инвентарь комнаты успешно создан.');
    }

    public function show(RoomInventory $roomInventory)
    {
        return view('room_inventory.show', compact('roomInventory'));
    }

    public function edit(RoomInventory $roomInventory)
    {
        $rooms = Room::all();
        $inventories = Inventory::all();
        return view('room_inventory.edit', compact('roomInventory', 'rooms', 'inventories'));
    }

    public function update(Request $request, RoomInventory $roomInventory)
    {
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'inventory_id' => 'required|exists:inventory,id',
            'quantity' => 'required|integer',
        ]);

        $roomInventory->update($validatedData);

        return redirect()->route('room_inventory.index')->with('success', 'Инвентарь комнаты успешно обновлен.');
    }

    public function destroy(RoomInventory $roomInventory)
    {
        $roomInventory->delete();

        return redirect()->route('room_inventory.index')->with('success', 'Инвентарь комнаты успешно удален.');
    }
}
