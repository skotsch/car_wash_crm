<!-- resources/views/includes/sidebar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">CarWashCRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Поиск" aria-label="Поиск">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Панель управления</p>
                    </a>
                </li>

                <!-- Clients -->
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Клиенты</p>
                    </a>
                </li>

                <!-- Orders -->
                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Заказы</p>
                    </a>
                </li>

                <!-- Services -->
                <li class="nav-item">
                    <a href="{{ route('services.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Услуги</p>
                    </a>
                </li>

                <!-- Employees -->
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Сотрудники</p>
                    </a>
                </li>

                <!-- Rooms -->
                <li class="nav-item">
                    <a href="{{ route('rooms.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>Помещения</p>
                    </a>
                </li>

                <!-- Inventory -->
                <li class="nav-item">
                    <a href="{{ route('inventory.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Инвентарь</p>
                    </a>
                </li>

                <!-- Room Inventory -->
                <li class="nav-item">
                    <a href="{{ route('room_inventory.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Инвентарь - помещения</p>
                    </a>
                </li>

                <!-- Transactions -->
                <li class="nav-item">
                    <a href="{{ route('transactions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Транзакции</p>
                    </a>
                </li>

                <!-- Order Services -->
                <li class="nav-item">
                    <a href="{{ route('order_services.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Услуги - заказы</p>
                    </a>
                </li>

                <!-- Employee Orders -->
                <li class="nav-item">
                    <a href="{{ route('employee_orders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Заказы - сотрудники</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
