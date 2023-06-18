
<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth">
    <div class="row flex-grow">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left p-5">
          <?= $this->session->flashdata('message') ?>

          <div class="brand-logo text-center">
            <img style="width: 80px" src="<?=base_url('assets/')?>assets/images/logo.jpg">
          </div>
          <div class="text-center">
            <h4>Sistem Informasi Pencatatan Penerimaan dan Pengeluaran Keuangan Rumah Sakit Umum Daerah Lahat</h4>
            <h6 class="font-weight-light">Silahkan login!</h6>
          </div>
          <form class="pt-3"  method="post">
            <div class="form-group">
              <input type="text" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="<?php echo set_value('email') ?>">
             <?= form_error('email', '<small class="text-danger">', '</small>') ?>

            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" >
             <?= form_error('email', '<small class="text-danger">', '</small>') ?>

            </div>
            <div class="mt-3">
              <button  type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn w-100">SIGN IN</button>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">

            </div>
            <div class="mb-2">

            </div>
            <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="<?=base_url('auth/registration') ?>" class="text-primary">Create</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
