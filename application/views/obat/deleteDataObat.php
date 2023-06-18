
<!-- Modal -->
<div class="modal fade" id="deleteObat<?=$obat['id_obat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus data obat</h5>
        <button type="button" class="btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tanggal penjualan : <b><?=date('d F Y', strtotime($obat['tgl_penjualan']))?></b><br>
        Nama : <b><?=$obat['nama'] ?></b><br>
        Jumlah : <b><?=rupiah($obat['jumlah'])?></b><br><br>Yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?=base_url('obat/deleteDataObat/').$obat['id_obat'] ?>" class="btn btn-danger">Hapus Data</a>
      </div>
    </div>
  </div>
</div>