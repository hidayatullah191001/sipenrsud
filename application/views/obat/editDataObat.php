
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
        <h6 class=" mb-5"><a href="<?=base_url('obat') ?>" style="text-decoration: none"><i class="mdi mdi-arrow-left"></i> Kembali</a> </h6>
        <form class="forms-sample" method="post">
           <div class="form-group">
            <label for="tgl_setor">Pasien</label>
            <select class="form-control" id="select2" name="id_pasien">
              <?php foreach ($pasiens as $pasien): ?>
                <?php 
                $selected = '';
                if ($pasien['id_pasien'] == $obat['id_pasien']) {
                  $selected = 'selected=""';
                }else{
                  $selected = '';
                } ?>
                <option <?=$selected ?> value="<?=$pasien['id_pasien'] ?>"><?=$pasien['nama']?> - <?=$pasien['alamat'] ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
          </div>
          <div class="form-group">
            <label for="tgl_penjualan">Tanggal Penjualan</label>
            <input type="date" class="form-control" id="tgl_penjualan" name="tgl_penjualan" 
            value="<?=$obat['tgl_penjualan']?>">
            <?= form_error('tgl_penjualan', '<small class="text-danger">', '</small>') ?>
          </div>
          <?= form_error('tgl_penjualan', '<small class="text-danger">', '</small>') ?>
         <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input type="text" class="form-control" id="dengan-rupiah" name="jumlah" placeholder="Masukkan jumlah..."  value="<?=$obat['jumlah']?>">
          <?= form_error('jumlah', '<small class="text-danger">', '</small>') ?>

        </div>
        <div class="form-check form-check-flat form-check-primary text-center">
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
