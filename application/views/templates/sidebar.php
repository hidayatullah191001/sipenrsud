<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="<?=base_url('assets/assets/upload/avatar/').$user['picture'] ?>" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2"><?=$user['name'] ?></span>
          </div>
        </a>
      </li>
      <li class="nav-item <?=($title == 'Dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?=base_url('kasir') ?>">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>

      <li class="nav-item <?=($title == 'Data Pasien') ? 'active' : '' ?>">
        <a class="nav-link" href="<?=base_url('pasien') ?>">
          <span class="menu-title">Data Pasien</span>
          <i class="mdi mdi-account-group menu-icon"></i>
        </a>
      </li>

      <li class="nav-item <?=($title == 'Data Parkir') ? 'active' : '' ?>">
        <a class="nav-link" href="<?=base_url('parkir') ?>">
          <span class="menu-title">Data Parkir</span>
          <i class="mdi mdi-parking menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('rawatinap') ?>">
          <span class="menu-title">Data Rawat Inap</span>
          <i class="mdi mdi-hospital-building menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('rawatjalan') ?>">
          <span class="menu-title">Data Rawat Jalan</span>
          <i class="mdi mdi-hospital menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('obat') ?>">
          <span class="menu-title">Data Obat</span>
          <i class="mdi mdi-pill menu-icon"></i>
        </a>
      </li>

        <li class="nav-item">
        <a class="nav-link" href="<?=base_url('rekapdata') ?>">
          <span class="menu-title">Rekap Data</span>
          <i class="mdi mdi-file menu-icon"></i>
        </a>
      </li>

      <li class="nav-item sidebar-actions">
        <span class="nav-link">
          <button data-toggle="modal" data-target="#logoutModal" class="btn btn-block btn-lg btn-gradient-primary mt-4">Keluar Aplikasi</button>
        </span>
      </li>
    </ul>
  </nav>


  <!-- partial -->
  <div class="main-panel">