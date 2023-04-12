<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link @yield('active-dashboard')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">DATA MASTER</li>
            <li class="nav-item">
              <a href="/buku" class="nav-link @yield('active-buku')">
                <i class="nav-icon fa fa-book"></i>
                <p>Buku</p>
              </a>
            </li>

              <li class="nav-item">
                <a href="/kategori" class="nav-link @yield('active-kategori')">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Kategori</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/rak" class="nav-link @yield('active-rak')">
                  <i class="nav-icon fas fa-box"></i>
                  <p>Rak</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/transaksi" class="nav-link @yield('active-transaksi')">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>
                    Transaksi
                  </p>
                </a>
              </li>

              @role('admin')
              <li class="nav-header">ADMIN</li>
              <li class="nav-item">
                <a href="/user" class="nav-link @yield('active-user')">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Daftar Anggota
                  </p>
                </a>
              </li>
              @endrole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>