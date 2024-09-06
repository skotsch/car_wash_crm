@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать инвентарь комнаты</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('room_inventory.update', $roomInventory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="room_id">Комната</label>
                                <select name="room_id" class="form-control" id="room_id">
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}" {{ $room->id == $roomInventory->room_id ? 'selected' : '' }}>{{ $room->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inventory_id">Инвентарь</label>
                                <select name="inventory_id" class="form-control" id="inventory_id">
                                    @foreach($inventories as $inventory)
                                        <option value="{{ $inventory->id }}" {{ $inventory->id == $roomInventory->inventory_id ? 'selected' : '' }}>{{ $inventory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Количество</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $roomInventory->quantity }}">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="{{ route('room_inventory.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
