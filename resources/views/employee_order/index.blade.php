@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Связь сотрудников с заказами</h3>
                        <div class="card-tools">
                            <a href="{{ route('employee_order.create') }}" class="btn btn-primary">Создать связь</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="employeeOrderTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Сотрудник</th>
                                    <th>Заказ</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employeeOrders as $employeeOrder)
                                    <tr>
                                        <td>{{ $employeeOrder->id }}</td>
                                        <td>{{ $employeeOrder->employee->last_name }} {{ $employeeOrder->employee->first_name }}</td>
                                        <td>{{ $employeeOrder->order->id }}</td>
                                        <td>
                                            <a href="{{ route('employee_order.show', $employeeOrder->id) }}" class="btn btn-info">Просмотр</a>
                                            <a href="{{ route('employee_order.edit', $employeeOrder->id) }}" class="btn btn-warning">Редактировать</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $employeeOrder->id }}">Удалить</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Сотрудник</th>
                                    <th>Заказ</th>
                                    <th>Действия</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<!-- Delete Modal -->
@foreach($employeeOrders as $employeeOrder)
<div class="modal fade" id="deleteModal{{ $employeeOrder->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $employeeOrder->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $employeeOrder->id }}">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить связь сотрудника с заказом {{ $employeeOrder->id }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="{{ route('employee_order.destroy', $employeeOrder->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
