@extends('layouts.adminlte')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Заказы</span>
                <span class="info-box-number">{{ $orders }}</span>
                <div class="mt-2">
                  <span class="badge badge-success">Завершенные: {{ $completedOrders }}</span>
                  <span class="badge badge-danger">Отмененные: {{ $cancelledOrders }}</span>
                  <span class="badge badge-warning">В обработке: {{ $pendingOrders }}</span>
                </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Клиенты</span>
                <span class="info-box-number">{{ $clients }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cogs"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Услуги</span>
                <span class="info-box-number">{{ $services }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Сотрудники</span>
                <span class="info-box-number">{{ $employees }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Последние заказы</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Статус</th>
                          <th>Время заказа</th>
                          <th>Клиент</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($latestOrders as $order)
                        <tr>
                          <td>{{ $order->id }}</td>
                          <td>{{ $order->status }}</td>
                          <td>{{ $order->order_time }}</td>
                          <td>{{ $order->client->last_name }} {{ $order->client->first_name }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Последние клиенты</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Фамилия</th>
                          <th>Имя</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($latestClients as $client)
                        <tr>
                          <td>{{ $client->id }}</td>
                          <td>{{ $client->last_name }}</td>
                          <td>{{ $client->first_name }}</td>
                          <td>{{ $client->email }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Статистика</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <h5>Самая популярная услуга</h5>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Услуга</th>
                          <th>Количество заказов</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($topServices as $service)
                        <tr>
                          <td>{{ $service->name }}</td>
                          <td>{{ $service->orders_count }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <h5>Самый продуктивный сотрудник</h5>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Сотрудник</th>
                          <th>Количество заказов</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($topEmployees as $employee)
                        <tr>
                          <td>{{ $employee->last_name }} {{ $employee->first_name }}</td>
                          <td>{{ $employee->orders_count }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <h5>Самый частый клиент</h5>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Клиент</th>
                          <th>Количество заказов</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($topClients as $client)
                        <tr>
                          <td>{{ $client->last_name }} {{ $client->first_name }}</td>
                          <td>{{ $client->orders_count }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
