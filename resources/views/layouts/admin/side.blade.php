<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin') }}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome</a>
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
            <a href="{{ url('user_list') }}" class="nav-link {{ getActiveClass(['UserController'],['index','create','edit']) }}">
              <i class="nav-icon fas fa-user"></i>
              <p>User</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('position_list') }}" class="nav-link {{ getActiveClass(['PositionController'],['index','create','edit']) }}">
              <i class="nav-icon fas fa-desktop"></i>
              <p>Position</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('department_list') }}" class="nav-link {{ getActiveClass(['DepartmentController'],['index','create','edit']) }}">
              <i class="nav-icon fas fa-desktop"></i>
              <p>Department</p>
            </a>
            </li>
             @if(isPermission('delete'))
          <li class="nav-item">
            <a href="{{ url('permission') }}" class="nav-link {{ getActiveClass(['PermissionController'],['index','create','edit']) }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>permission</p>
            </a>
            </li>
            @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
   