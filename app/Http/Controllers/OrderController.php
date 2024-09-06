<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        $rooms = Room::all();
        $services = Service::all();
        return view('orders.create', compact('clients', 'rooms', 'services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'order_time' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'service_id' => 'required|exists:services,id',
        ]);

        Order::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Client::all();
        $rooms = Room::all();
        $services = Service::all();
        return view('orders.edit', compact('order', 'clients', 'rooms', 'services'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'order_time' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален.');
    }
}
