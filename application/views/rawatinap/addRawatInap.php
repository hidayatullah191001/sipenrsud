
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
      <h6 class=" mb-5"><a href="<?=base_url('RawatInap') ?>" style="text-decoration: none"><i class="mdi mdi-arrow-left"></i> Kembali</a> </h6>
      <form class="forms-sample" method="post">
        <div class="form-group">
          <label for="tgl_setor">Pasien</label>
          <select class="form-control" id="selectPasien" name="id_pasien">
            <option selected="" disabled="">Pilih Data Pasien</option>
            <?php foreach ($pasiens as $pasien): ?>
              <option  value="<?=$pasien['id_pasien'] ?>"><?=$pasien['nama']?> - <?=$pasien['alamat'] ?></option>
            <?php endforeach ?>
          </select>
          <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
          <label for="tgl_setor">Unit</label>
          <select class="form-control" id="selectUnit" name="id_unit">
            <option selected="" disabled="">Pilih Data Unit</option>
            <?php foreach ($units as $unit): ?>
              <option  value="<?=$unit['id_unit'] ?>"><?=$unit['nama_unit']?></option>
            <?php endforeach ?>
          </select>
          <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
          <label for="tanggal_rawatinap">Tanggal Rawat Inap</label>
          <input type="date" class="form-control" id="tanggal_rawatinap" name="tanggal_rawatinap" value="<?=set_value('tanggal_rawatinap') ?>" placeholder="Masukkan tanggal rawat inap pasien...">
          <?= form_error('tanggal_rawatinap', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
          <label for="no_reg">No Registrasi</label>
          <input type="text" class="form-control" id="no_reg" name="no_reg" value="<?=set_value('no_reg') ?>" placeholder="Masukkan no registrasi pasien...">
          <?= form_error('no_reg', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
          <label for="no_reg">Jenis Perawatan</label>
          <select class="form-control" id="perawatan" name="perawatan">
            <option selected="" disabled="">Pilih Jenis Perawatan</option>
            <option value="Kelas I">Kelas I</option>
            <option value="Kelas II">Kelas II</option>
            <option value="Kelas III">Kelas III</option>
          </select>
          <?= form_error('perawatan', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
          <label for="jumlah_perawatan">Biaya Perawatan</label>
          <input type="text" class="form-control" id="dengan-rupiah" name="jumlah_perawatan" value="0" placeholder="Masukkan biaya perawatan...">
          <?= form_error('jumlah_perawatan', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
          <label for="no_reg">Jenis Tindakan</label>
          <select class="form-control" id="tindakan" name="tindakan">
            <option selected="" disabled="">Pilih Jenis Tindakan</option>
            <option value="Radiologi">Radiologi</option>
            <option value="Labor">Labor</option>
            <option value="EKG">EKG</option>
            <option value="BDRS">BDRS</option>
            <option value="Pel.Konsul">Pel.Konsul</option>
            <option value="Konsul Dr Anak">Konsul Dr Anak</option>
            <option value="OK Sentral">OK Sentral</option>
            <option value="Fisio">Fisio</option>
            <option value="Obat">Obat</option>
            <option value="Visum">Visum</option>
            <option value="Ass">Ass</option>
            <option value="Kelahiran">Kelahiran</option>
            <option value="Tindakan IGD">Tindakan IGD</option>
            <option value="Retribusi">Retribusi</option>
          </select>
          <?= form_error('tindakan', '<small class="text-danger">', '</small>') ?>
        </div>

      <div class="form-group">
        <label for="jumlah_tindakan">Biaya Tindakan</label>
        <input type="text" class="form-control" id="dengan-rupiah-2" name="jumlah_tindakan" value="0" placeholder="Masukkan tindakan...">
        <?= form_error('jumlah_tindakan', '<small class="text-danger">', '</small>') ?>
      </div>

      <div class="form-check form-check-flat form-check-primary text-center">
        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>
</div>
