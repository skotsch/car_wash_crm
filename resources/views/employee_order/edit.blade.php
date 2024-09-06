@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать связь сотрудника с заказом</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('employee_order.update', $employeeOrder->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="employee_id">Сотрудник</label>
                                <select name="employee_id" class="form-control" id="employee_id">
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ $employee->id == $employeeOrder->employee_id ? 'selected' : '' }}>{{ $employee->last_name }} {{ $employee->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order_id">Заказ</label>
                                <select name="order_id" class="form-control" id="order_id">
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}" {{ $order->id == $employeeOrder->order_id ? 'selected' : '' }}>{{ $order->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="{{ route('employee_order.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
