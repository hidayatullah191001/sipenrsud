<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="<?=base_url('') ?>"><img style="width: 20px;" src="<?=base_url('assets/') ?>assets/images/logo.jpg" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?=base_url('assets/') ?>assets/images/logo.jpg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
     <li class="nav-item d-none d-lg-block full-screen-link">
      <a class="nav-link">
        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
      </a>
    </li>
    <li class="nav-item nav-profile dropdown">
      <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="nav-profile-img">
          <img src="<?=base_url('assets/assets/upload/avatar/').$user['picture'] ?>" alt="image">
          <span class="availability-status online"></span>
        </div>
        <div class="nav-profile-text">
          <p class="mb-1 text-black"><?=$user['name']?></p>
        </div>
      </a>
      <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="<?=base_url('profile/edit') ?>">
          <i class="mdi mdi-account-edit me-2 text-success"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
            <i class="mdi mdi-logout me-2 text-primary"></i> Keluar </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>