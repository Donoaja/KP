<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin/dashboard" class="brand-link bg-gradient-primary text-center">
    <img src="/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .9;">
    <span class="brand-text font-weight-bold text-light">Admin Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="/admin/dashboard" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt text-info"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Saran -->
        <li class="nav-item">
          <a href="/admin/saran" class="nav-link">
            <i class="nav-icon fas fa-comment-dots text-warning"></i>
            <p>Saran</p>
          </a>
        </li>

        <!-- Blog Menu -->

        <li class="nav-item">
          <a href="/admin/Blog" class="nav-link">
            <i class="nav-icon fas fa-file text-danger"></i>
            <p>Blog</p>
          </a>
        </li>


        <!-- About -->
        <li class="nav-item">
          <a href="/admin/about" class="nav-link">
            <i class="nav-icon fas fa-info-circle text-success"></i>
            <p>About</p>
          </a>
        </li>

        <!-- Produk -->
        <li class="nav-item">
          <a href="/admin/produk" class="nav-link">
            <i class="nav-icon fas fa-box-open text-primary"></i>
            <p>Produk</p>
          </a>
        </li>

        <!-- Banner -->
        <li class="nav-item">
          <a href="/admin/banner" class="nav-link">
            <i class="nav-icon fas fa-image text-purple"></i>
            <p>Banner</p>
          </a>
        </li>

        <!-- User -->
        <li class="nav-item">
          <a href="/admin/user" class="nav-link">
            <i class="nav-icon fas fa-users text-light"></i>
            <p>User</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- CSS Hover Effects -->
<style>
  .nav-sidebar .nav-link {
    transition: all 0.3s ease;
    border-radius: 5px;
    margin: 3px 0;
  }

  .nav-sidebar .nav-link:hover {
    background-color: #1e282c;
    transform: translateX(5px);
    color: #ffffff !important;
  }

  .nav-sidebar .nav-link i {
    transition: transform 0.3s ease;
  }

  .nav-sidebar .nav-link:hover i {
    transform: scale(1.1);
  }

  .brand-link {
    transition: background-color 0.3s ease;
  }

  .brand-link:hover {
    background-color: #007bff;
  }
</style>
