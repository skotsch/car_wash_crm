<?php

namespace App\Http\Controllers;

use App\Models\EmployeeOrder;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class EmployeeOrderController extends Controller
{
    public function index()
    {
        $employeeOrders = EmployeeOrder::all();
        return view('employee_orders.index', compact('employeeOrders'));
    }

    public function create()
    {
        $employees = Employee::all();
        $orders = Order::all();
        return view('employee_orders.create', compact('employees', 'orders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'order_id' => 'required|exists:orders,id',
        ]);

        EmployeeOrder::create($validatedData);

        return redirect()->route('employee_orders.index')->with('success', 'EmployeeOrder успешно создан.');
    }

    public function show(EmployeeOrder $employeeOrder)
    {
        return view('employee_orders.show', compact('employeeOrder'));
    }

    public function edit(EmployeeOrder $employeeOrder)
    {
        $employees = Employee::all();
        $orders = Order::all();
        return view('employee_orders.edit', compact('employeeOrder', 'employees', 'orders'));
    }

    public function update(Request $request, EmployeeOrder $employeeOrder)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'order_id' => 'required|exists:orders,id',
        ]);

        $employeeOrder->update($validatedData);

        return redirect()->route('employee_orders.index')->with('success', 'EmployeeOrder успешно обновлен.');
    }

    public function destroy(EmployeeOrder $employeeOrder)
    {
        $employeeOrder->delete();

        return redirect()->route('employee_orders.index')->with('success', 'EmployeeOrder успешно удален.');
    }
}
