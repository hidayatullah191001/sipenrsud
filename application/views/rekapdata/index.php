
<div class="content-wrapper">
 <?=$this->session->flashdata('message') ?>

 <div class="page-header">

  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-file"></i>
      </span> <?=$title ?>
    </h3>
  </div>


  <div class="accordion mb-4" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
            Input Data Pengguna
          </button>
        </h2>
      </div>
      <div id="collapseZero" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <form method="post" <?php if ($datapengguna != null) : ?>
            action="<?=base_url('RekapData/editDataPengguna/').$datapengguna['id'] ?>"
          <?php endif ?>>
            <div class="form-group">
              <label for="pengguna_anggaran">Nama Pengguna Anggaran</label>
              <input type="text" id="pengguna_anggaran" name="pengguna_anggaran" class="form-control" placeholder="Masukkan nama pengguna anggaran..." 
              value="<?=($datapengguna!= null) ? $datapengguna['pengguna_anggaran'] : '' ?>">
              <?= form_error('pengguna_anggaran', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="bendahara_penerimaan">Nama Bendahara Penerimaan</label>
              <input type="text" id="bendahara_penerimaan" name="bendahara_penerimaan" class="form-control" placeholder="Masukkan nama bendahara penerimaan" 
              value="<?=($datapengguna != null) ? $datapengguna['bendahara_penerimaan'] : '' ?>">
              <?= form_error('bendahara_penerimaan', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group text-center">
              <?php if ($datapengguna != null): ?>
                <button class="btn btn-warning btn-sm" type="submit">Edit Data</button>
                <a href="<?=base_url('RekapData/hapusDataPengguna/').$datapengguna['id'] ?>" class="btn btn-danger btn-sm"> Hapus Data</a>
              <?php else : ?>
                <button class="btn btn-gradient-primary btn-sm" type="submit">Tambah Data</button>
              <?php endif ?>
            </div>
          </form> 
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Rekap Data Berdasarkan Tanggal
          </button>
        </h2>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <form method="get">
            <div class="row align-items-center">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control">
                    <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="tgl_akhir">Tanggal Akhir</label>
                    <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control">
                    <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
              </div>
              <div>
               <button type="submit" class="btn btn-gradient-primary btn-sm w-100">Filter</button>
             </div>
           </div>
         </form> 
       </div>
     </div>
   </div>
   <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Rekap Data Berdasarkan Pasien
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <form method="get">
         <div class="row align-items-center">
           <div class="form-group">
            <label for="tgl_setor">Filter Rekap Data Berdasarkan Pasien</label><br>
            <select style="width: 100%" class="form-control" id="selectRekap" name="id_pasien">
              <option selected="" disabled="">Pilih Data Pasien</option>
              <?php foreach ($pasiens as $pasien): ?>
                <option  value="<?=$pasien['id_pasien'] ?>"><?=$pasien['nama']?> - <?=$pasien['alamat'] ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
          </div>
          <div>
            <button type="submit" class="btn btn-gradient-primary btn-sm w-100">Filter</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<?php if (isset($_GET['tgl_mulai']) && isset($_GET['tgl_akhir'])): ?>
<?php if ($_GET['tgl_mulai'] != null && $_GET['tgl_akhir'] != null): ?>
  <div class="card">
    <div class="card-body">
      <div class="text-center">
       <h5>Download Hasil Rekap Data Disini!</h5>
       <a href="<?=base_url('RekapData/exportToExcel?tgl_mulai=').$_GET['tgl_mulai'].'&tgl_akhir='.$_GET['tgl_akhir'] ?>" class="btn btn-success btn-sm "><i class="mdi mdi-file-excel"></i> Export Excel</a>
     </div>
   </div>
 </div>
<?php endif ?>
<?php endif ?>

<?php if(isset($_GET['id_pasien'])) :?>
  <?php if ($_GET['id_pasien'] != null): ?>
    <div class="card">
      <div class="card-body">
        <div class="text-center">
         <h5>Download Hasil Rekap Data Disini!</h5>
         <a href="<?=base_url('RekapData/exportToPdf?id_pasien=').$_GET['id_pasien'] ?>" class="btn btn-danger btn-sm "><i class="mdi mdi-file-pdf"></i> Export PDF</a>

       </div>
     </div>
   </div>
 <?php endif ?>
<?php endif ?>
</div>



