<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'phone' => 'required',
            'email' => 'nullable|email',
        ]);

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Клиент успешно создан.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'phone' => 'required',
            'email' => 'nullable|email',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Клиент успешно обновлен.');
    }

    public function destroy(Client $client)
    {
        if ($client->orders()->exists()) {
            return redirect()->route('clients.index')->with('error', 'Невозможно удалить клиента, так как на него есть ссылки в заказах.');
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Клиент успешно удален.');
    }
}
