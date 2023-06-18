
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
           <center>
              <h3>
                Selamat Datang di Sistem Informasi <br> Pencatatan Penerimaan dan Pengeluaran <br>Pada Bidang Keuangan Rumah Sakit Umum Daerah Lahat
              </h3>
            </center>
            <br><br>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="<?=base_url('assets/') ?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Pendapatan Obat<i class="mdi mdi-pill
                   mdi-24px float-right"></i>
                  </h4>
                  <h3 class="mb-5"><?=rupiah($sum_obat['total']) ?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="<?=base_url('assets/') ?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Pendapatan Rawat Inap<i class="mdi mdi-hospital-building mdi-24px float-right"></i>
                  </h4>
                  <h3 class="mb-5"><?=rupiah($sum_rawatinap['total']) ?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="<?=base_url('assets/') ?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Pendapatan Rawat Jalan<i class="mdi mdi-hospital mdi-24px float-right"></i>
                  </h4>
                  <h3 class="mb-5"><?=rupiah($sum_rawatjalan['total']) ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
