<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Service;
use App\Models\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::count();
        $clients = Client::count();
        $services = Service::count();
        $employees = Employee::count();

        $latestOrders = Order::latest()->take(5)->get();
        $latestClients = Client::latest()->take(5)->get();

        return view('home', compact('orders', 'clients', 'services', 'employees', 'latestOrders', 'latestClients'));
    }
}
