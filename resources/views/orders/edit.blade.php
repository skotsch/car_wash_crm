@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать заказ</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Статус</label>
                                <input type="text" name="status" class="form-control" id="status" value="{{ $order->status }}" required>
                            </div>
                            <div class="form-group">
                                <label for="order_time">Время заказа</label>
                                <input type="datetime-local" name="order_time" class="form-control" id="order_time" value="{{ $order->order_time }}" required>
                            </div>
                            <div class="form-group">
                                <label for="client_id">Клиент</label>
                                <select name="client_id" class="form-control" id="client_id" required>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ $client->id == $order->client_id ? 'selected' : '' }}>{{ $client->last_name }} {{ $client->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="room_id">Комната</label>
                                <select name="room_id" class="form-control" id="room_id" required>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}" {{ $room->id == $order->room_id ? 'selected' : '' }}>{{ $room->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="service_ids">Услуги</label>
                                <select name="service_ids[]" class="form-control" id="service_ids" multiple required>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ in_array($service->id, $order->services->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
