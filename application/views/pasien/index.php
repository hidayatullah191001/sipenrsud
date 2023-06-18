
<div class="content-wrapper">
 <?=$this->session->flashdata('message') ?>

 <div class="page-header">

  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-file"></i>
      </span> <?=$title ?>
    </h3>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between mb-4">
        <div class="col-lg-9">
          <a href="<?=base_url('pasien/addDataPasien') ?>" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-plus"></i> Tambah Data</a>
        </div>
        <div class="col">
          <?php if (count($pasiens) > 0): ?>
            <a href="<?=base_url('pasien/exportToExcel') ?>" class="btn btn-success btn-sm "><i class="mdi mdi-file-excel"></i> Export Excel</a>
          <?php endif ?>
        </div>
      </div>
      <table id="tabel-data" class="table table-responsive">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach ($pasiens as $pasien) : ?>
            <tr>
              <td><?=$i++; ?></td>
              <td><?=$pasien['nama'] ?></td>
              <td><?=$pasien['umur'] ?></td>
              <td><?=$pasien['jenis_kelamin'] ?></td>
              <td><?=elipsisText($pasien['alamat'])?></td>
              <td>
                <a href="<?=base_url('pasien/editDataPasien/').$pasien['id_pasien'] ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i>Edit</a>
                <button data-toggle="modal"data-target="#deletePasien<?=$pasien['id_pasien'] ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Hapus</button>
              </td>
            </tr>
            <?php include 'deleteDataPasien.php' ?>
          <?php endforeach ?>
        </tbody>
      </table>

      
    </div>
  </div>
</div>
