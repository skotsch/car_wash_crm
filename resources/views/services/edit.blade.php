@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать услугу</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $service->name }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price" value="{{ $service->price }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" class="form-control" id="description">{{ $service->description }}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="{{ route('services.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
