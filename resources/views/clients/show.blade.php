@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Детали клиента</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $client->id }}</p>
                        <p><strong>Фамилия:</strong> {{ $client->last_name }}</p>
                        <p><strong>Имя:</strong> {{ $client->first_name }}</p>
                        <p><strong>Отчество:</strong> {{ $client->middle_name }}</p>
                        <p><strong>Телефон:</strong> {{ $client->phone }}</p>
                        <p><strong>Email:</strong> {{ $client->email }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Редактировать</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $client->id }}">Удалить</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $client->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $client->id }}">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить клиента {{ $client->last_name }} {{ $client->first_name }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
