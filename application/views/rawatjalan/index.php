
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
          <a href="<?=base_url('RawatJalan/addRawatJalan') ?>" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-plus"></i> Tambah Data</a>
        </div>
        <div class="col">
        <?php if (count($rawatjalans) > 0): ?>
          <a href="<?=base_url('RawatJalan/exportToExcel') ?>" class="btn btn-success btn-sm "><i class="mdi mdi-file-excel"></i> Export Excel</a>
          <?php endif ?>
        </div>
      </div>
      <div class="table-responsive">
        <table id="tabel-data" class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Pasien</th>
            <th>Tanggal Rawat Jalan</th>
            <th>Biaya Rawat Jalan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody> 
          <?php 
          $i = 1;
          foreach ($rawatjalans as $rawatjalan) : ?>
            <tr>
              <td><?=$i++; ?></td>
              <td><?=$rawatjalan['nama'] ?></td>
              <td><?=date('d F Y', strtotime($rawatjalan['tanggal_rawatjalan']))?></td>
              <td><?=rupiah($rawatjalan['jumlah_rawatjalan']) ?></td>
              <td>
                <a href="<?=base_url('RawatJalan/editRawatJalan/').$rawatjalan['id_rawatjalan'] ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i>Edit</a>
                <button data-toggle="modal"data-target="#deleteRawatJalan<?=$rawatjalan['id_rawatjalan'] ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Hapus</button>
              </td>
            </tr>
            <?php include 'deleteDataRawatJalan.php' ?> 
          <?php endforeach ?>
        </tbody>
     </table>
      </div>
     <div class="mt-5">
      <h4>Total Pendapatan Rawat Inap : <span class="text-danger"><?=rupiah($sum_rawatjalan['total']) ?></span></h4>
    </div>
  </div>
</div>
</div>
