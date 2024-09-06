@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" class="dataTables_wrapper dt-bootstrap4">
                    <div class="card-header">
                        <h3 class="card-title">Клиенты</h3>
                        <div class="card-tools">
                            <a href="{{ route('clients.create') }}" class="btn btn-primary">Создать клиента</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="ordersTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Фамилия</th>
                                    <th>Имя</th>
                                    <th>Отчество</th>
                                    <th>Телефон</th>
                                    <th>Email</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->last_name }}</td>
                                        <td>{{ $client->first_name }}</td>
                                        <td>{{ $client->middle_name }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>
                                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">Просмотр</a>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Редактировать</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $client->id }}">Удалить</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
@foreach($clients as $client)
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
@endforeach

@endsection
<!--
@section('scripts')
<script>
    $(function () {
        $('#clientsTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection -->
