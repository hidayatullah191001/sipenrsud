
<div class="content-wrapper">
 <?=$this->session->flashdata('message') ?>
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-plus"></i>
        </span><?=$title ?>
      </h3>
    </div>
    <div class="card">
      <div class="card-body">
        <h6 class=" mb-5"><a href="<?=base_url('pasien') ?>" style="text-decoration: none"><i class="mdi mdi-arrow-left"></i> Kembali</a> </h6>
        <form class="forms-sample" method="post">
          <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?=set_value('nama') ?>" placeholder="Masukkan nama pasien...">
            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
          </div>
         <div class="form-group">
            <label for="usia">Usia</label>
            <input type="number" class="form-control" id="usia" name="usia" value="<?=set_value('usia') ?>" placeholder="Masukkan usia pasien...">
            <?= form_error('usia', '<small class="text-danger">', '</small>') ?>
          </div>

          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin">
              <option selected="" disabled="">Pilih Jenis Kelamin</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
             <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
          </div>

          <div class="form-group">
            <label for="nama">Alamat</label>
            <textarea style="height: 100px" class="form-control" name="alamat" placeholder="Masukkan alamat pasien..."></textarea>
             <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
          </div>

        <div class="form-check form-check-flat form-check-primary text-center">
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
