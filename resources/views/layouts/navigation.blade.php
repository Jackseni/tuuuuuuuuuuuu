<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('schedule.index') }}" class="nav-link {{ request()->is('schedule*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                        {{ __('Cronograma') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('contingency.index') }}" class="nav-link {{ request()->is('contingency*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chalkboard"></i>
                    <p>
                        {{ __('Plan de Contingencia') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
