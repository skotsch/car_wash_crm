<?php

namespace App\Http\Controllers;

use App\Models\OrderService;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    public function index()
    {
        $orderServices = OrderService::all();
        return view('order_services.index', compact('orderServices'));
    }

    public function create()
    {
        $orders = Order::all();
        $services = Service::all();
        return view('order_services.create', compact('orders', 'services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'service_id' => 'required|exists:services,id',
        ]);

        OrderService::create($validatedData);

        return redirect()->route('order_services.index')->with('success', 'OrderService успешно создан.');
    }

    public function show(OrderService $orderService)
    {
        return view('order_services.show', compact('orderService'));
    }

    public function edit(OrderService $orderService)
    {
        $orders = Order::all();
        $services = Service::all();
        return view('order_services.edit', compact('orderService', 'orders', 'services'));
    }

    public function update(Request $request, OrderService $orderService)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'service_id' => 'required|exists:services,id',
        ]);

        $orderService->update($validatedData);

        return redirect()->route('order_services.index')->with('success', 'OrderService успешно обновлен.');
    }

    public function destroy(OrderService $orderService)
    {
        $orderService->delete();

        return redirect()->route('order_services.index')->with('success', 'OrderService успешно удален.');
    }
}
