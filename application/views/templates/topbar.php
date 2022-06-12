<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?= $jumlah['jumlah']; ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?= $jumlah['jumlah']; ?> Notifications</span>
            <?php foreach ($notifikasi as $n) : ?>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('Pegawai/FormDetail/') . $n['idpegawai']; ?>" class="dropdown-item">
                <i class="fas fa-users mr-2"></i><?= $n['nama_pegawai']; ?><br>
                <i class="fas fa-envelope mr-2"></i> Pensiun dalam waktu <?= $n['selisih_bulan']; ?> Bulan
              </a>
              <div class="dropdown-divider"></div>
            <?php endforeach; ?>
            <a href="<?= base_url('Laporan'); ?>" class="dropdown-item dropdown-footer">Lihat Semua</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i> <?= $user['nama']; ?> <span class="caret"></span>
          </a>
          <div class="dropdown-menu">
            <a href="<?= base_url('Auth/profile/') . $user['id']; ?>" class="dropdown-item" tabindex="-1" href="#">Profile</a>
            <a href="<?= base_url('Auth/logout'); ?>" class="dropdown-item" tabindex="-1" href="#">Log Out</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->