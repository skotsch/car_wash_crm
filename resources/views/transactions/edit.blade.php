@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать транзакцию</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="order_id">Заказ</label>
                                <select name="order_id" class="form-control" id="order_id">
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}" {{ $order->id == $transaction->order_id ? 'selected' : '' }}>{{ $transaction->order->order_time }} {{ $transaction->order->client->last_name }} {{ $transaction->order->client->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Метод оплаты</label>
                                <select name="payment_method" class="form-control" id="payment_method" required>
                                    <option value="Наличные">Наличные</option>
                                    <option value="Карта">Карта</option>
                                    <option value="Перевод">Перевод</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
