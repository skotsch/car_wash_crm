@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Детали инвентаря комнаты</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $roomInventory->id }}</p>
                        <p><strong>Комната:</strong><a href="{{ route('rooms.show', $roomInventory->room->id) }}"> {{ $roomInventory->room->address }}</a></p>
                        <p><strong>Инвентарь:</strong><a href="{{ route('inventory.show', $roomInventory->inventory->id) }}"> {{ $roomInventory->inventory->name }}</a></p>
                        <p><strong>Количество:</strong> {{ $roomInventory->quantity }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('room_inventory.edit', $roomInventory->id) }}" class="btn btn-warning">Редактировать</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $roomInventory->id }}">Удалить</button>
                        <a href="{{ route('room_inventory.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Modal -->
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
@endsection
