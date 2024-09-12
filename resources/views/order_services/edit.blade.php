@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать Order Service</h3>
                    </div>
                    <form action="{{ route('order_services.update', $orderService->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="order_id">Заказ</label>
                                <select name="order_id" class="form-control" required>
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}" {{ $order->id == $orderService->order_id ? 'selected' : '' }}>{{ $orderService->order->order_time }} {{ $orderService->order->client->last_name }} {{ $orderService->order->client->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="service_id">Услуга</label>
                                <select name="service_id" class="form-control" required>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ $service->id == $orderService->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="{{ route('order_services.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
