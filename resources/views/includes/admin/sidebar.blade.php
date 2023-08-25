  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{@url('/admin')}}" class="brand-link">
      <img src="{{@url('/admin/dist/img/AdminLTELogo.png')}}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{@url('/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline d-none">
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
            <a href="{{@url('/admin/home')}}" class="nav-link {{$dashboardActive??''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if (Gate::check('role-list') || Gate::check('role-create'))
          <li class="nav-item {{$blogOpening??''}} {{$blogOpend??''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Roles
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('role-list') 
              <li class="nav-item">
                <a href="{{@url('/roles')}}" class="nav-link {{$blogListActive??''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              @endcan
              @can('role-create') 
              <li class="nav-item">
                <a href="{{@url('/roles/create')}}" class="nav-link {{$blogCreateActive??''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              @endcan
              
            </ul>
          </li>
          @endif
          @if (Gate::check('user-list') || Gate::check('user-create'))
          <li class="nav-item {{$blogOpening??''}} {{$blogOpend??''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('user-list')
            <li class="nav-item">
              <a href="{{@url('/users')}}" class="nav-link {{$blogListActive??''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              @endcan
              @can('user-create')
              <li class="nav-item">
                <a href="{{@url('/users/create')}}" class="nav-link {{$blogCreateActive??''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              @endcan
              
            </ul>
          </li>
          @endif
          @can('app-settings')
          <li class="nav-item {{$blogOpening??''}} {{$blogOpend??''}}">
            <a href="{{@url('/app-settings')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                App Settings
                <!-- <i class="fas fa-angle-left right"></i> -->
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
          </li>
          @endcan

          @if (Gate::check('user-list') || Gate::check('user-create'))
          <li class="nav-item {{$blogOpening??''}} {{$blogOpend??''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Meetings
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('user-list')
            <li class="nav-item">
              <a href="{{@url('/meetings')}}" class="nav-link {{$blogListActive??''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              @endcan
              @can('user-create')
              <li class="nav-item">
                <a href="{{@url('/users/create')}}" class="nav-link {{$blogCreateActive??''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              @endcan
              
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="JAVASCRIPT://" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="far fa-circle  nav-icon"></i>
                <p>{{ __('Logout') }}</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>