@extends('layouts.adminlte')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Создать инвентарь</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('inventory.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Введите название">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Введите описание"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="type">Тип</label>
                                <input type="text" name="type" class="form-control" id="type" placeholder="Введите тип">
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Введите цену">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Создать</button>
                            <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
