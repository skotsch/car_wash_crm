<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Order;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'patronymic' => 'nullable',
            'phone' => 'required',
            'email' => 'nullable|email',
            'position' => 'required',
        ]);

        Employee::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Сотрудник успешно создан.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'patronymic' => 'nullable',
            'phone' => 'required',
            'email' => 'nullable|email',
            'position' => 'required',
        ]);

        $employee->update($validatedData);

        return redirect()->route('employees.index')->with('success', 'Сотрудник успешно обновлен.');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->orders()->exists()) {
            return redirect()->route('employees.index')->with('error', 'Невозможно удалить сотрудника, так как на него есть ссылки в заказах.');
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Сотрудник успешно удален.');
    }
}
