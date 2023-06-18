<!-- Modal -->
<div class="modal fade" id="detailRekapData<?=$rekapdata['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Rekap Data Pasien <?=$rekapdata['nama'] ?></h5>
        <button type="button" class="btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 >Data Pasien</h5>
        Nama : <b><?=$rekapdata['nama'] ?></b><br>
        Umur : <b><?=$rekapdata['umur'] ?></b><br>
        Jenis Kelamin : <b><?=$rekapdata['jenis_kelamin'] ?></b><br>
        Alamat : <b><?=$rekapdata['alamat'] ?></b><br>
        Tanggal: <b><?=date('d F Y', strtotime($rekapdata['tanggal_rawatinap'])) ?></b><br>

        <?php if ($rekapdata['jumlah'] != null): ?>
         <h5 class="mt-4">Data Obat</h5>
         Pendapatan Obat : <b><?=rupiah($rekapdata['jumlah']) ?></b><br>
       <?php endif ?>

       <?php if ($rekapdata['jumlah_perawatan'] != null): ?>
        <h5 class="mt-4">Data Rawat Inap</h5>
        Unit : <b><?=$rekapdata['nama_unit'] ?></b><br>
        Jenis Perawatan : <b><?=$rekapdata['perawatan'] ?></b><br>
        Biaya Perawatan : <b><?=rupiah($rekapdata['jumlah_perawatan']) ?></b><br>
        Biaya Tindakan : <b><?=rupiah($rekapdata['jumlah_tindakan']) ?></b><br>
        Total Pendapatan Rawat Inap : <b><?=rupiah($rekapdata['total_pendapatan']) ?></b><br>
      <?php endif ?>

      <?php if ($rekapdata['jumlah_rawatjalan'] != null): ?>
        <h5 class="mt-4">Data Rawat Jalan</h5>
        Biaya Pendapatan Rawat Jalan : <b><?=rupiah($rekapdata['jumlah_rawatjalan']) ?></b><br>
      <?php endif ?>
      

      <h5 class="mt-4">Total Pendapatan</h5>
      Total Pendapatan dari Pasien : <b class="text-danger"><?=rupiah($totalPendapatanDariPasien) ?></b><br>

      <br>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>