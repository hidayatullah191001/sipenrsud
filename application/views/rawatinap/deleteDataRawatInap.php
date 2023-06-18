
<!-- Modal -->
<div class="modal fade" id="deleteRawatInap<?=$rawatinap['id_rawatinap'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data rawatinap</h5>
        <button type="button" class="btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nama : <b><?=$rawatinap['nama'] ?></b><br>
        Unit : <b><?=$rawatinap['nama_unit'] ?></b><br>
        Tanggal Rawat Inap : <b><?=date('d F Y', strtotime($rawatinap['tanggal_rawatinap'])) ?></b><br>
        No Registrasi : <b><?=$rawatinap['no_reg'] ?></b><br>

        <br>Yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?=base_url('RawatInap/deleteDataRawatInap/').$rawatinap['id_rawatinap'] ?>" class="btn btn-danger">Hapus Data</a>
      </div>
    </div>
  </div>
</div>