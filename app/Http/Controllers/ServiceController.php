<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\OrderService;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Service::create($validatedData);

        return redirect()->route('services.index')->with('success', 'Услуга успешно создана.');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $service->update($validatedData);

        return redirect()->route('services.index')->with('success', 'Услуга успешно обновлена.');
    }

    public function destroy(Service $service)
    {
        if (OrderService::where('service_id', $service->id)->exists()) {
            return redirect()->route('services.index')->with('error', 'Невозможно удалить услугу, так как на нее есть ссылки в заказах.');
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Услуга успешно удалена.');
    }
}
