
<div class="content-wrapper">
 <?=$this->session->flashdata('message') ?>
 <div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-plus"></i>
      </span><?=$title ?>
    </h3>
  </div>
  <div class="card">
    <div class="card-body">
      <h6 class=" mb-5"><a href="<?=base_url('RawatJalan') ?>" style="text-decoration: none"><i class="mdi mdi-arrow-left"></i> Kembali</a> </h6>
      <form class="forms-sample" method="post">
        <div class="form-group">
          <label for="tgl_setor">Pasien</label>
          <select class="form-control" id="selectPasien" name="id_pasien">
            <?php foreach ($pasiens as $pasien): ?>
              <?php 
              $selected = '';
              if ($pasien['id_pasien'] == $rawatjalan['id_pasien']) {
                $selected = 'selected=""';
              }else{
                $selected = '';
              } ?>
              <option <?=$selected ?> value="<?=$pasien['id_pasien'] ?>"><?=$pasien['nama']?> - <?=$pasien['alamat'] ?></option>
            <?php endforeach ?>
          </select>
          <?= form_error('id_pasien', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
          <label for="tanggal_rawatjalan">Tanggal Rawat Jalan</label>
          <input type="date" class="form-control" id="tanggal_rawatjalan" name="tanggal_rawatjalan" 
          value="<?=$rawatjalan['tanggal_rawatjalan']?>" placeholder="Masukkan tanggal rawat inap pasien...">
          <?= form_error('tanggal_rawatjalan', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="rotgen">Rotgen</label>
              <input type="text" class="form-control" id="dengan-rupiah-rotgen" name="rotgen" 
              value="<?=$rawatjalan['rontgen'] ?>" placeholder="Masukkan biaya rotgen...">
              <?= form_error('rotgen', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="DR">DR</label>
              <input type="text" class="form-control" id="dengan-rupiah-DR" name="DR" 
              value="<?=$rawatjalan['dr'] ?>" placeholder="Masukkan biaya DR...">
              <?= form_error('DR', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="labor">Labor</label>
              <input type="text" class="form-control" id="dengan-rupiah-labor" name="labor" value="<?=$rawatjalan['labor'] ?>" placeholder="Masukkan biaya labor...">
              <?= form_error('labor', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="kiur">kiur</label>
              <input type="text" class="form-control" id="dengan-rupiah-kiur" name="kiur" value="<?=$rawatjalan['kiur'] ?>" placeholder="Masukkan biaya kiur...">
              <?= form_error('kiur', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="dr1">dr</label>
              <input type="text" class="form-control" id="dengan-rupiah-dr1" name="dr1" value="<?=$rawatjalan['dr1'] ?>" placeholder="Masukkan biaya dr...">
              <?= form_error('dr1', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="pbedah">P.bedah</label>
              <input type="text" class="form-control" id="dengan-rupiah-pbedah" name="pbedah" value="<?=$rawatjalan['pbedah'] ?>" placeholder="Masukkan biaya P.bedah...">
              <?= form_error('pbedah', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="dr2">dr</label>
              <input type="text" class="form-control" id="dengan-rupiah-dr2" name="dr2" value="<?=$rawatjalan['dr2'] ?>" placeholder="Masukkan biaya dr...">
              <?= form_error('dr2', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="pgigi">P.gigi</label>
              <input type="text" class="form-control" id="dengan-rupiah-pgigi" name="pgigi" value="<?=$rawatjalan['pgigi'] ?>" placeholder="Masukkan biaya P.gigi...">
              <?= form_error('pgigi', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="dr3">dr</label>
              <input type="text" class="form-control" id="dengan-rupiah-dr3" name="dr3" value="<?=$rawatjalan['dr3'] ?>" placeholder="Masukkan biaya dr...">
              <?= form_error('dr3', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="igd">IGD</label>
              <input type="text" class="form-control" id="dengan-rupiah-igd" name="igd" value="<?=$rawatjalan['igd'] ?>" placeholder="Masukkan biaya IGD...">
              <?= form_error('igd', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
        </div>

        <div class="row">
         <div class="col">
          <div class="form-group">
            <label for="karcis">Karcis</label>
            <input type="text" class="form-control" id="dengan-rupiah-karcis" name="karcis" value="<?=$rawatjalan['karcis'] ?>" placeholder="Masukkan biaya karcis...">
            <?= form_error('karcis', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="dr4">dr</label>
            <input type="text" class="form-control" id="dengan-rupiah-dr4" name="dr4" value="<?=$rawatjalan['dr4'] ?>" placeholder="Masukkan biaya dr...">
            <?= form_error('dr4', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="pkb">P.Kb</label>
            <input type="text" class="form-control" id="dengan-rupiah-pkb" name="pkb" value="<?=$rawatjalan['pkb'] ?>" placeholder="Masukkan biaya P.kb...">
            <?= form_error('pkb', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="dr5">dr</label>
            <input type="text" class="form-control" id="dengan-rupiah-dr5" name="dr5" value="<?=$rawatjalan['dr5'] ?>" placeholder="Masukkan biaya dr...">
            <?= form_error('dr5', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="ptht">P.THT</label>
            <input type="text" class="form-control" id="dengan-rupiah-ptht" name="ptht" value="<?=$rawatjalan['ptht'] ?>" placeholder="Masukkan biaya P.THT...">
            <?= form_error('ptht', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="dr6">dr</label>
            <input type="text" class="form-control" id="dengan-rupiah-dr6" name="dr6" value="<?=$rawatjalan['dr6'] ?>" placeholder="Masukkan biaya dr...">
            <?= form_error('dr6', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="pmata">P.Mata</label>
            <input type="text" class="form-control" id="dengan-rupiah-pmata" name="pmata" value="<?=$rawatjalan['pmata'] ?>" placeholder="Masukkan biaya P.Mata...">
            <?= form_error('pmata', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="dr7">dr</label>
            <input type="text" class="form-control" id="dengan-rupiah-dr7" name="dr7" value="<?=$rawatjalan['dr7'] ?>" placeholder="Masukkan biaya dr...">
            <?= form_error('dr7', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="fisio">Fisio</label>
            <input type="text" class="form-control" id="dengan-rupiah-fisio" name="fisio" value="<?=$rawatjalan['fisio'] ?>" placeholder="Masukkan biaya Fisio...">
            <?= form_error('fisio', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="dr8">dr</label>
            <input type="text" class="form-control" id="dengan-rupiah-dr8" name="dr8" value="<?=$rawatjalan['dr8'] ?>" placeholder="Masukkan biaya dr...">
            <?= form_error('dr8', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col">
        <div class="form-group">
          <label for="panak">P.Anak</label>
          <input type="text" class="form-control" id="dengan-rupiah-panak" name="panak" value="<?=$rawatjalan['panak'] ?>" placeholder="Masukkan biaya P.Anak...">
          <?= form_error('panak', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="dr9">dr</label>
          <input type="text" class="form-control" id="dengan-rupiah-dr9" name="dr9" value="<?=$rawatjalan['dr9'] ?>" placeholder="Masukkan biaya dr...">
          <?= form_error('dr9', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="hemodia">Hemodia</label>
          <input type="text" class="form-control" id="dengan-rupiah-hemodia" name="hemodia" value="<?=$rawatjalan['hemodia'] ?>" placeholder="Masukkan biaya Hemodia...">
          <?= form_error('hemodia', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="dr10">dr</label>
          <input type="text" class="form-control" id="dengan-rupiah-dr10" name="dr10" value="<?=$rawatjalan['dr10'] ?>" placeholder="Masukkan biaya dr...">
          <?= form_error('dr10', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="pimu">P.imu</label>
          <input type="text" class="form-control" id="dengan-rupiah-pimu" name="pimu" value="<?=$rawatjalan['pimu'] ?>" placeholder="Masukkan biaya P.imu...">
          <?= form_error('pimu', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="pvct">P.VCT</label>
          <input type="text" class="form-control" id="dengan-rupiah-pvct" name="pvct" value="<?=$rawatjalan['pvct'] ?>" placeholder="Masukkan biaya P.VCT...">
          <?= form_error('pvct', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="visum">Visum</label>
          <input type="text" class="form-control" id="dengan-rupiah-visum" name="visum" value="<?=$rawatjalan['visum'] ?>" placeholder="Masukkan biaya Visum...">
          <?= form_error('visum', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="asuransi">Asuransi</label>
          <input type="text" class="form-control" id="dengan-rupiah-asuransi" name="asuransi" value="<?=$rawatjalan['asuransi'] ?>" placeholder="Masukkan biaya Asuransi...">
          <?= form_error('asuransi', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="drpparu">dr P.Paru</label>
          <input type="text" class="form-control" id="dengan-rupiah-drpparu" name="drpparu" value="<?=$rawatjalan['drpparu'] ?>" placeholder="Masukkan biaya dr P.Paru...">
          <?= form_error('drpparu', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="drpsaraf">dr P.Saraf</label>
          <input type="text" class="form-control" id="dengan-rupiah-drpsaraf" name="drpsaraf" value="<?=$rawatjalan['drpsaraf'] ?>" placeholder="Masukkan biaya dr P.Saraf...">
          <?= form_error('drpsaraf', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="pdalam">P.Dalam</label>
          <input type="text" class="form-control" id="dengan-rupiah-pdalam" name="pdalam" value="<?=$rawatjalan['pdalam'] ?>" placeholder="Masukkan biaya P.VCT...">
          <?= form_error('pdalam', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="dr11">dr</label>
          <input type="text" class="form-control" id="dengan-rupiah-dr11" name="dr11" value="<?=$rawatjalan['dr11'] ?>" placeholder="Masukkan biaya dr...">
          <?= form_error('dr11', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="psikolog">Psikolog</label>
          <input type="text" class="form-control" id="dengan-rupiah-psikolog" name="psikolog" value="<?=$rawatjalan['psikolog'] ?>" placeholder="Masukkan biaya Psikolog...">
          <?= form_error('psikolog', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="drkulit">dr Kulit</label>
          <input type="text" class="form-control" id="dengan-rupiah-drkulit" name="drkulit" value="<?=$rawatjalan['drkulit'] ?>" placeholder="Masukkan biaya dr Kulit...">
          <?= form_error('drkulit', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="ambulance">Ambulance</label>
          <input type="text" class="form-control" id="dengan-rupiah-ambulance" name="ambulance" value="<?=$rawatjalan['ambulance'] ?>" placeholder="Masukkan biaya Ambulance...">
          <?= form_error('ambulance', '<small class="text-danger">', '</small>') ?>
        </div>
      </div>
    </div> 

    <div class="form-check form-check-flat form-check-primary text-center">
      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
      <button class="btn btn-light">Cancel</button>
    </form>
  </div>
</div>
</div>
</div>
