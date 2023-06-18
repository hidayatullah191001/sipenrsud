
<!-- Modal -->
<div class="modal fade" id="deleteRawatJalan<?=$rawatjalan['id_rawatjalan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Rawat Jalan</h5>
        <button type="button" class="btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nama : <b><?=$rawatjalan['nama'] ?></b><br>
        Tanggal Rawat Jalan : <b><?=date('d F Y', strtotime($rawatjalan['tanggal_rawatjalan'])) ?></b><br>
        Jumlah Rawat Jalan : <b><?=rupiah($rawatjalan['jumlah_rawatjalan']) ?></b><br>

        <br>Yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?=base_url('RawatJalan/deleteDataRawatJalan/').$rawatjalan['id_rawatjalan'] ?>" class="btn btn-danger">Hapus Data</a>
      </div>
    </div>
  </div>
</div>