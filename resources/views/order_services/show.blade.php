@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Просмотр Order Service</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $orderService->id }}</p>
                        <p><strong>Заказ:</strong> <a href="{{ route ('orders.show', $orderService->order_id) }}">{{ $orderService->order->order_time }} {{ $orderService->order->client->last_name }} {{ $orderService->order->client->first_name }}</a></p>
                        <p><strong>Услуга:</strong> <a href="{{ route ('services.show', $orderService->service_id) }}">{{ $orderService->service->name }}</a></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('order_services.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
