
<!-- Modal -->
<div class="modal fade" id="deleteParkir<?=$parkir['id_parkir'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus data parkir</h5>
        <button type="button" class="btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tanggal setor : <b><?=date('d/m/Y', strtotime($parkir['tgl_setor']))?></b><br>
        Tanggal setoran : <b><?=date('d/m/Y', strtotime($parkir['tgl_setoran']))?></b><br>
        Jumlah setoran : <b><?=rupiah($parkir['jumlah_setoran'])?></b><br><br>Yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?=base_url('parkir/deleteDataParkir/').$parkir['id_parkir'] ?>" class="btn btn-danger">Hapus Data</a>
      </div>
    </div>
  </div>
</div>