<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
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
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- Tickets -->
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->routeIs('tickets.index') ? 'active' : '' }} {{ request()->routeIs('tickets.create') ? 'active' : '' }}" data-toggle="collapse" data-target="#tickets-menu">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview collapse" id="tickets-menu">
              <li class="nav-item">
                <a href="{{ route('tickets.index') }}" class="nav-link {{ request()->routeIs('tickets.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tickets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tickets.create') }}" class="nav-link {{ request()->routeIs('tickets.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Ticket</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- HRMS (Visible to 'staff' role only) -->
          @if(Auth::user()->usertype == 'staff')
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->routeIs('leave-requests.create') ? 'active' : '' }} {{ request()->routeIs('leave-requests.index') ? 'active' : '' }}" data-toggle="collapse" data-target="#hrms-menu">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                HRMS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview collapse" id="hrms-menu">
            <li class="nav-item">
                <a href="{{ route('leave-requests.index') }}" class="nav-link {{ request()->routeIs('leave-requests.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('leave-requests.create') }}" class="nav-link {{ request()->routeIs('leave-requests.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Submit</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <!-- /.sidebar-menu -->
        </ul>
      </nav>
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
