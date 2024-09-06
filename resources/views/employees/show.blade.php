@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Детали сотрудника</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $employee->id }}</p>
                        <p><strong>Фамилия:</strong> {{ $employee->last_name }}</p>
                        <p><strong>Имя:</strong> {{ $employee->first_name }}</p>
                        <p><strong>Отчество:</strong> {{ $employee->patronymic }}</p>
                        <p><strong>Телефон:</strong> {{ $employee->phone }}</p>
                        <p><strong>Email:</strong> {{ $employee->email }}</p>
                        <p><strong>Должность:</strong> {{ $employee->position }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Редактировать</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $employee->id }}">Удалить</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $employee->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $employee->id }}">Подтверждение удаления</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить сотрудника {{ $employee->last_name }} {{ $employee->first_name }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
