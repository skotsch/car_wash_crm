<!-- resources/views/order_services/index.blade.php -->

@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order Services</h3>
                        <div class="card-tools">
                            <a href="{{ route('order_services.create') }}" class="btn btn-primary">Создать Order Service</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ordersTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order ID</th>
                                    <th>Service ID</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderServices as $orderService)
                                    <tr>
                                        <td>{{ $orderService->id }}</td>
                                        <td>
                                            <a href="{{ route('orders.show', $orderService->order_id) }}">{{ $orderService->order_id }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('services.show', $orderService->service_id) }}">{{ $orderService->service->name }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('order_services.show', $orderService->id) }}" class="btn btn-info">Просмотр</a>
                                            <a href="{{ route('order_services.edit', $orderService->id) }}" class="btn btn-warning">Редактировать</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $orderService->id }}">Удалить</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Order ID</th>
                                    <th>Service ID</th>
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
@foreach($orderServices as $orderService)
<div class="modal fade" id="deleteModal{{ $orderService->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $orderService->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $orderService->id }}">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить Order Service {{ $orderService->id }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="{{ route('order_services.destroy', $orderService->id) }}" method="POST" style="display: inline;">
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
