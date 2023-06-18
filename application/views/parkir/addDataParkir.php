<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-plus"></i>
        </span><?=$title ?>
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">

        </ul>
      </nav>
    </div>
    <div class="card">
      <div class="card-body">
        <h6 class=" mb-5"><a href="<?=base_url('parkir') ?>" style="text-decoration: none"><i class="mdi mdi-arrow-left"></i> Kembali</a> </h6>
        <form class="forms-sample" method="post">
        <div class="form-group">
          <label for="tgl_setor">Tanggal Setor</label>
          <input type="date" class="form-control" id="tgl_setor" name="tgl_setor" value="<?=set_value('tgl_setor') ?>">
          <?= form_error('tgl_setor', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="form-group">
         <label for="tgl_setoran">Tanggal Setor</label>
         <input type="date" class="form-control" id="tgl_setoran" name="tgl_setoran" value="<?=set_value('tgl_setoran') ?>">
         <?= form_error('tgl_setoran', '<small class="text-danger">', '</small>') ?>
       </div>
       <div class="form-group">
        <label for="jumlah_setoran">Jumlah Setoran</label>
        <input type="text" class="form-control" id="dengan-rupiah" name="jumlah_setoran" placeholder="Masukkan jumlah setoran ...." value="<?=set_value('jumlah_setoran') ?>">
        <?= form_error('jumlah_setoran', '<small class="text-danger">', '</small>') ?>
      </div>
      <div class="form-check form-check-flat form-check-primary text-center">
        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>
</div>