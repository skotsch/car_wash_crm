@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Детали транзакции</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $transaction->id }}</p>
                        <p><strong>Заказ:</strong><a href="{{ route('orders.show', $transaction->order->id) }}"> {{ $transaction->order->order_time }} {{ $transaction->order->client->last_name }} {{ $transaction->order->client->first_name }}</a></p>
                        <p><strong>Сумма:</strong> {{ $transaction->amount }}</p>
                        <p><strong>Метод оплаты:</strong> {{ $transaction->payment_method }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Редактировать</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $transaction->id }}">Удалить</button>
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $transaction->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $transaction->id }}">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить транзакцию {{ $transaction->id }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
