<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required',
        ]);

        Room::create($validatedData);

        return redirect()->route('rooms.index')->with('success', 'Комната успешно создана.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'address' => 'required',
        ]);

        $room->update($validatedData);

        return redirect()->route('rooms.index')->with('success', 'Комната успешно обновлена.');
    }

    public function destroy(Room $room)
    {
        if ($room->hasOrders()) {
            return redirect()->route('rooms.index')->with('error', 'Невозможно удалить помещение, так как на него есть ссылки в заказах.');
        }

        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Комната успешно удалена.');
    }
}
