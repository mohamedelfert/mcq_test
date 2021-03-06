<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('/') }}/design/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('home') }}" class="nav-link">{{ trans('main.home') }}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        @include('admin.layouts.menu')

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
        <img src="{{ url('/assets/images/icon.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ trans('main.brand') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/assets/images/male.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }} <br> <small><i class="fa fa-circle text-success"></i> Online</small></a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ trans('main.dashboard') }}</p>
                    </a>
                </li>
                @can('topic-list')
                    <li class="nav-item {{ active_menu('topics')[0] }}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-book-open"></i>
                            <p>
                                {{ trans('main.topics') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" {{ active_menu('topics')[1] }}>
                            <li class="nav-item">
                                <a href="{{ adminUrl('topics') }}" class="nav-link">
                                    <i class="fas fa-list-ol"></i>
                                    <p>{{ trans('main.topics_list') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('question-list')
                    <li class="nav-item {{ active_menu('questions')[0] }}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-bookmark"></i>
                            <p>
                                {{ trans('main.questions') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" {{ active_menu('questions')[1] }}>
                            <li class="nav-item">
                                <a href="{{ adminUrl('questions') }}" class="nav-link">
                                    <i class="fas fa-list-ol"></i>
                                    <p>{{ trans('main.questions_list') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ adminUrl('options') }}" class="nav-link">
                                    <i class="fas fa-list"></i>
                                    <p>{{ trans('main.questions_options') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('test-list')
                    <li class="nav-item">
                        <a href="{{ adminUrl('tests') }}" class="nav-link">
                            <i class="nav-icon fas fa-question"></i>
                            <p>{{ trans('main.tests') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ adminUrl('results') }}" class="nav-link">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>{{ trans('main.results') }}</p>
                        </a>
                    </li>
                @endcan
                @can('user-list')
                <li class="nav-item {{ active_menu('users')[0] }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-shield"></i>
                        <p>
                            {{ trans('main.users') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" {{ active_menu('users')[1] }}>
                        <li class="nav-item">
                            <a href="{{ adminUrl('users') }}" class="nav-link">
                                <i class="fas fa-user-plus"></i>
                                <p>{{ trans('main.users_list') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ adminUrl('roles') }}" class="nav-link">
                                <i class="fas fa-user-secret"></i>
                                <p>{{ trans('main.roles_list') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
