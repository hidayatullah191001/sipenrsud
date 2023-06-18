
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
          <a href="<?=base_url('obat/addDataObat') ?>" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-plus"></i> Tambah Data</a>
        </div>
        <?php if (count($obats) > 0): ?>
          <div class="col">
            <a href="<?=base_url('obat/exportToExcel') ?>" class="btn btn-success btn-sm "><i class="mdi mdi-file-excel"></i> Export Excel</a>
          </div>
        <?php endif ?>
      </div>
      <div class="table-responsive">
        <table id="tabel-data" class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Pasien</th>
              <th>Tanggal Penjualan</th>
              <th>Pendapatan Obat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            foreach ($obats as $obat) : ?>
              <tr>
                <td><?=$i++; ?></td>
                <td><?=$obat['nama'] ?> - <?=elipsisText($obat['alamat']) ?></td>
                <td><?=date('d F Y', strtotime($obat['tgl_penjualan'])) ?></td>
                <td><?=rupiah($obat['jumlah']) ?></td>
                <td>
                  <a href="<?=base_url('obat/editDataObat/').$obat['id_obat'] ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i>Edit</a>
                  <button data-toggle="modal"data-target="#deleteObat<?=$obat['id_obat'] ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Hapus</button>
                </td>
              </tr>
              <?php include 'deleteDataObat.php' ?>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="mt-5">
        <h4>Total Pendapatan Obat : <span class="text-danger"><?=rupiah($sum_obat['total']) ?></span></h4>
      </div>
    </div>
  </div>
</div>
