<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Room;
use App\Models\Service;
use App\Models\Employee;
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
        $employees = Employee::all();
        return view('orders.create', compact('clients', 'rooms', 'services', 'employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'order_time' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'service_ids' => 'required|array',
            'service_ids.*' => 'exists:services,id',
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,id',
        ]);

        $order = Order::create($validatedData);
        $order->services()->attach($validatedData['service_ids']);
        $order->employees()->attach($validatedData['employee_ids']);

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
        $employees = Employee::all(); // Добавляем эту строку
        return view('orders.edit', compact('order', 'clients', 'rooms', 'services', 'employees'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'order_time' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'service_ids' => 'required|array',
            'service_ids.*' => 'exists:services,id',
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,id',
        ]);

        $order->update($validatedData);
        $order->services()->sync($validatedData['service_ids']);
        $order->employees()->sync($validatedData['employee_ids']);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    public function destroy(Order $order)
    {
        $order->services()->detach();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален.');
    }
}
