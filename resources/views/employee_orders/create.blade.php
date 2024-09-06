<!-- resources/views/employee_orders/create.blade.php -->

@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Создать Employee Order</h3>
                    </div>
                    <form action="{{ route('employee_orders.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="employee_id">Employee</label>
                                <select name="employee_id" class="form-control" required>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order_id">Order</label>
                                <select name="order_id" class="form-control" required>
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Создать</button>
                            <a href="{{ route('employee_orders.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
