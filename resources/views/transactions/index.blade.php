@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Транзакции</h3>
                        <div class="card-tools">
                            <a href="{{ route('transactions.create') }}" class="btn btn-primary">Создать транзакцию</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ordersTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заказ</th>
                                    <th>Сумма</th>
                                    <th>Метод оплаты</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->order->id }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->payment_method }}</td>
                                        <td>
                                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info">Просмотр</a>
                                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Редактировать</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $transaction->id }}">Удалить</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Заказ</th>
                                    <th>Сумма</th>
                                    <th>Метод оплаты</th>
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
@foreach($transactions as $transaction)
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
@endforeach
@endsection
