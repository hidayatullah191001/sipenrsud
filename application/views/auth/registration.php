<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth">
    <div class="row flex-grow">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left p-5">
         <div class="brand-logo text-center">
          <img style="width: 80px" src="<?=base_url('assets/')?>assets/images/logo.jpg">
        </div>
        <div class="text-center">
          <h4>Sistem Informasi Pencatatan Penerimaan dan Pengeluaran Keuangan Rumah Sakit Umum Daerah Lahat</h4>
          <h6 class="font-weight-light">Daftarkan akun kamu disini!</h6>
        </div>
        <form class="pt-3" method="post" action="<?=base_url('auth/registration') ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Masukkan nama..." value="<?php echo set_value('name') ?>">
             <?= form_error('name', '<small class="text-danger">', '</small>') ?>
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Masukkan email..." value="<?php echo set_value('email') ?>">
             <?= form_error('email', '<small class="text-danger">', '</small>') ?>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="password" name="password1" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                 <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <input type="password" name="password2" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Repeat">
              </div>
            </div>
          </div>
          <div class="mb-4">
            <div class="form-check">
              <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input">Lihat Password</label>
              </div>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn w-100">SIGN UP</button>
            </div>
            <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?=base_url('auth') ?>" class="text-primary">Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>