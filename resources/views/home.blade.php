@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="mt-4">
                        <a href="{{ route('clients.index') }}" class="btn btn-primary">Clients</a>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary">Orders</a>
                        <a href="{{ route('services.index') }}" class="btn btn-primary">Services</a>
                        <a href="{{ route('employees.index') }}" class="btn btn-primary">Employees</a>
                        <a href="{{ route('rooms.index') }}" class="btn btn-primary">Rooms</a>
                        <a href="{{ route('inventory.index') }}" class="btn btn-primary">Inventory</a>
                        <a href="{{ route('room_inventory.index') }}" class="btn btn-primary">Room Inventory</a>
                        <a href="{{ route('transactions.index') }}" class="btn btn-primary">Transactions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
