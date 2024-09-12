@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Создать заказ</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Статус</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="pending">В обработке</option>
                                    <option value="completed">Завершен</option>
                                    <option value="cancelled">Отменен</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order_time">Время заказа</label>
                                <input type="datetime-local" name="order_time" class="form-control" id="order_time" required>
                            </div>
                            <div class="form-group">
                                <label for="client_id">Клиент</label>
                                <select name="client_id" class="form-control" id="client_id" required>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->last_name }} {{ $client->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="room_id">Помещение</label>
                                <select name="room_id" class="form-control" id="room_id" required>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="service_ids">Услуги</label>
                                <select name="service_ids[]" class="form-control select2" id="service_ids" multiple="multiple" data-placeholder="Выберите услуги" style="width: 100%;" required>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employee_ids">Сотрудники</label>
                                <select name="employee_ids[]" class="form-control select2" id="employee_ids" multiple="multiple" data-placeholder="Выберите сотрудников" style="width: 100%;" required>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->last_name }} {{ $employee->first_name }}</option>
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
                            <button type="submit" class="btn btn-primary">Создать</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
