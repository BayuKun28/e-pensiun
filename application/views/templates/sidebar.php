  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Dashboard'); ?>" class="brand-link">
      <img src="<?= base_url('assets/'); ?>logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold"><b>
          <h3> E-PENSIUN</h3>
        </b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets'); ?>/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user['nama']; ?></a>
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
      <?php if ($this->session->userdata('level')  == 1) { ?>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Dashboard'); ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Tahun'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tahun</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Jabatan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jabatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Pangkat'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pangkat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Pegawai'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item">
            <a href="<?= base_url('Pendaftaran'); ?>" class="nav-link">
              <i class="nav-icon  fas fa-cash-register"></i>
              <p>
                Pendaftaran
              </p>
            </a>
          </li> -->
            <li class="nav-item">
              <a href="<?= base_url('Laporan'); ?>" class="nav-link">
                <i class="nav-icon  fas fa-newspaper"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fas fa-cogs"></i>
                <p>
                  Setting
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Usiapensiun'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usia Pensiun</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Tandatangan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tanda Tangan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Auth/pengguna'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengguna</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      <?php }
      if ($this->session->userdata('level') == 2) { ?>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('Dashboard'); ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Laporan'); ?>" class="nav-link">
                <i class="nav-icon  fas fa-newspaper"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
          </ul>
        </nav>
      <?php }; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>