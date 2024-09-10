@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Инвентарь в помещениях</h3>
                        <div class="card-tools">
                            <a href="{{ route('room_inventory.create') }}" class="btn btn-primary">Присвоить инвентарь помещению</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table id="ordersTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Помещение</th>
                                    <th>Инвентарь</th>
                                    <th>Количество</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roomInventories as $roomInventory)
                                    <tr>
                                        <td>{{ $roomInventory->id }}</td>
                                        <td>
                                            <a href="{{ route('rooms.show', $roomInventory->room->id) }}">{{ $roomInventory->room->address }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('inventory.show', $roomInventory->inventory->id) }}">{{ $roomInventory->inventory->name }}</a>
                                        </td>
                                        <td>{{ $roomInventory->quantity }}</td>
                                        <td>
                                            <a href="{{ route('room_inventory.show', $roomInventory->id) }}" class="btn btn-info">Просмотр</a>
                                            <a href="{{ route('room_inventory.edit', $roomInventory->id) }}" class="btn btn-warning">Редактировать</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $roomInventory->id }}">Удалить</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Помещение</th>
                                    <th>Инвентарь</th>
                                    <th>Количество</th>
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
@foreach($roomInventories as $roomInventory)
<div class="modal fade" id="deleteModal{{ $roomInventory->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $roomInventory->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $roomInventory->id }}">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить инвентарь комнаты {{ $roomInventory->id }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="{{ route('room_inventory.destroy', $roomInventory->id) }}" method="POST" style="display: inline;">
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
