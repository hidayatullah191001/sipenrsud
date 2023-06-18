
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
          <a href="<?=base_url('parkir/addDataParkir') ?>" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-plus"></i> Tambah Data</a>
        </div>
        <div class="col">
          <?php if (count($parkirs) > 0): ?>
            <a href="<?=base_url('parkir/exportToExcel') ?>" class="btn btn-success btn-sm "><i class="mdi mdi-file-excel"></i> Export Excel</a>
          <?php endif ?>
        </div>
      </div>
      <div class="table-responsive">
        <table id="tabel-data" class="table ">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Setor</th>
            <th>Tanggal Setoran</th>
            <th>Jumlah Setoran</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach ($parkirs as $parkir) : ?>
            <tr>
              <td><?=$i++; ?></td>
              <td><?=date('d/m/Y', strtotime($parkir['tgl_setor'])) ?></td>
              <td><?=date('d/m/Y', strtotime($parkir['tgl_setoran'])) ?></td>
              <td><?=rupiah($parkir['jumlah_setoran']) ?></td>
              <td>
                <a href="<?=base_url('parkir/editDataParkir/').$parkir['id_parkir'] ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i>Edit</a>
                <button data-toggle="modal"data-target="#deleteParkir<?=$parkir['id_parkir'] ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Hapus</button>
              </td>
            </tr>
            <?php include 'deleteDataParkir.php' ?>
          <?php endforeach ?>
        </tbody>
      </table>
      </div>

      <div class="mt-5">
        <h4>Total Setoran Parkir : <span class="text-danger"><?=rupiah($sum_parkir['total']) ?></span></h4>
      </div>
    </div>
  </div>
</div>
