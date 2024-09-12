<!-- resources/views/employee_orders/show.blade.php -->

@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Просмотр Employee Order</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $employeeOrder->id }}</p>
                        <p><strong>Сотрудник:</strong>
                            <a href="{{ route('employees.show', $employeeOrder->employee_id) }}">{{ $employeeOrder->employee->last_name }} {{ $employeeOrder->employee->first_name }}</a>
                        </p>
                        <p><strong>Заказ:</strong>
                            <a href="{{ route('orders.show', $employeeOrder->order_id) }}">{{ $employeeOrder->order->order_time }} {{ $employeeOrder->order->client->last_name }} {{ $employeeOrder->order->client->first_name }}</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('employee_orders.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
