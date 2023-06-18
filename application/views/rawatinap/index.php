
<div class="content-wrapper">
 <?=$this->session->flashdata('message') ?>

 <div class="page-header">

  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-file"></i>
      </span> <?=$title ?>
    </h3>
  </div>

  <div class="card mb-4">
    <div class="card-body">
      <form method="get">
       <div class="row align-items-center">
         <div class="col">
           <div class="form-group">
            <label for="tgl_setor">Filter Data Rawat Inap Berdasarkan Unit</label>
            <select class="form-control" id="selectUnit" name="id_unit">
              <option selected="" disabled="">Pilih Data Unit</option>
              <?php foreach ($units as $unit): ?>
                <option  value="<?=$unit['id_unit'] ?>"><?=$unit['nama_unit']?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="col-lg-1">
          <button type="submit" class="btn btn-gradient-primary btn-sm">Filter</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row justify-content-between mb-4">
      <div class="col-lg-9">
        <a href="<?=base_url('RawatInap/addRawatInap') ?>" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-plus"></i> Tambah Data</a>
      </div>
      <div class="col">
        <?php if (count($rawatinaps) > 0): ?>
         <?php if (isset($_GET['id_unit']) != null): ?>
            <a href="<?=base_url('RawatInap/exportToExcel/').$_GET['id_unit'] ?>" class="btn btn-success btn-sm "><i class="mdi mdi-file-excel"></i> Export Excel</a>
          <?php else : ?>
             <a href="<?=base_url('RawatInap/exportToExcel')?>" class="btn btn-success btn-sm "><i class="mdi mdi-file-excel"></i> Export Excel</a>
         <?php endif ?>
        <?php endif ?>
      </div>
    </div>
    <table id="tabel-data" class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Pasien</th>
          <th>Unit</th>
          <th>Tanggal Rawat Inap</th>
          <th>No Registrasi</th>
          <th>Perawatan</th>
          <th>Total Pendapatan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody> 
        <?php 
        $i = 1;
        foreach ($rawatinaps as $rawatinap) : ?>
          <tr>
            <td><?=$i++; ?></td>
            <td><?=$rawatinap['nama'] ?></td>
            <td><?=$rawatinap['nama_unit'] ?></td>
            <td><?=date('d F Y', strtotime($rawatinap['tanggal_rawatinap']))?></td>
            <td><?=$rawatinap['no_reg'] ?></td>
            <td><?=$rawatinap['perawatan'] ?></td>
            <td><?=rupiah($rawatinap['total_pendapatan']) ?></td>
            <td>
              <a href="<?=base_url('RawatInap/editRawatInap/').$rawatinap['id_rawatinap'] ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i>Edit</a>
              <button data-toggle="modal"data-target="#deleteRawatInap<?=$rawatinap['id_rawatinap'] ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Hapus</button>
            </td>
          </tr>
          <?php include 'deleteDataRawatInap.php' ?> 
        <?php endforeach ?>
      </tbody>
    </table>
    <div class="mt-5">
      <h4>Total Pendapatan Rawat Inap : <span class="text-danger"><?=rupiah($sum_rawatinap['total']) ?></span></h4>
    </div>
  </div>
</div>
</div>
