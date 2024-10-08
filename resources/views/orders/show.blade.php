@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Детали заказа</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $order->id }}</p>
                        <p><strong>Статус:</strong> {{ $order->status }}</p>
                        <p><strong>Время заказа:</strong> {{ $order->order_time }}</p>
                        <p><strong>Клиент:</strong><a href="{{ route('clients.show', $order->client->id) }}"> {{ $order->client->first_name }}</a></p>
                        <p><strong>Комната:</strong><a href="{{ route('rooms.show', $order->room->id) }}"> {{ $order->room->address }}</p></a>
                        <p><strong>Услуги:</strong>
                            <ul>
                                @foreach($order->services as $service)
                                    <li><a href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a></li>
                                @endforeach
                            </ul>
                        </p>
                        <p><strong>Сотрудники:</strong>
                            <ul>
                                @foreach($order->employees as $employee)
                                    <li><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->last_name }} {{ $employee->first_name }}</a></li>
                                @endforeach
                            </ul>
                        </p>
                        <p><strong>Сумма:</strong> {{ $order->transaction->amount }}</p>
                        <p><strong>Метод оплаты:</strong> {{ $order->transaction->payment_method }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Редактировать</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $order->id }}">Удалить</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $order->id }}">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить заказ {{ $order->id }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
