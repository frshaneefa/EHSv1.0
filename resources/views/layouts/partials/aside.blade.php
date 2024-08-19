<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('images/logoene.jpg') }}" alt="ENETECH logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ENETECH Sdn Bhd</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome {{ Auth::user()->name }}</a>
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
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- Management -->
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }} {{ request()->routeIs('admin.users.create') ? 'active' : '' }}" data-toggle="collapse" data-target="#management-menu">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview collapse" id="management-menu">
              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users.create') }}" class="nav-link {{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register New User</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Tickets -->
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->routeIs('admin.tickets.index') ? 'active' : '' }} {{ request()->routeIs('admin.tickets.create') ? 'active' : '' }}" data-toggle="collapse" data-target="#tickets-menu">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview collapse" id="tickets-menu">
              <li class="nav-item">
                <a href="{{ route('admin.tickets.index') }}" class="nav-link {{ request()->routeIs('admin.tickets.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tickets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tickets.create') }}" class="nav-link {{ request()->routeIs('admin.tickets.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Ticket</p>
                </a>
              </li>
            </ul>
          </li>

            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('sidebar-search');
    const menuItems = document.querySelectorAll('.nav-sidebar .nav-link p');

    searchInput.addEventListener('input', function() {
      const query = searchInput.value.toLowerCase();

      menuItems.forEach(function(item) {
        const text = item.textContent.toLowerCase();
        const parentItem = item.closest('.nav-item');

        if (text.includes(query)) {
          parentItem.style.display = '';
        } else {
          parentItem.style.display = 'none';
        }
      });
    });
  });
  </script>

