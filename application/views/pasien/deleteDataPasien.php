
<!-- Modal -->
<div class="modal fade" id="deletePasien<?=$pasien['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pasien</h5>
        <button type="button" class="btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nama : <b><?=$pasien['nama'] ?></b><br>
        Usia : <b><?=$pasien['umur'] ?></b><br>
        Jenis Kelamin : <b><?=$pasien['jenis_kelamin'] ?></b><br>
        Alamat : <b><?=$pasien['alamat'] ?></b><br>

        <br>Yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?=base_url('pasien/deleteDataPasien/').$pasien['id_pasien'] ?>" class="btn btn-danger">Hapus Data</a>
      </div>
    </div>
  </div>
</div>