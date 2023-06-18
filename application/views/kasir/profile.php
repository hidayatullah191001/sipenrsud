
<div class="content-wrapper">
 <?=$this->session->flashdata('message') ?>

 <div class="page-header">

  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-file"></i>
      </span> <?=$title ?>
    </h3>
  </div>

  <div class="col-lg-8">
    <?= form_open_multipart('profile/edit') ?>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Full name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']?>">
        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2">Picture</div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('assets/assets/upload/avatar/').$user['picture'] ?>" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <div class="custom-file">
             <input type="file" class="tambah-file custom-file-input" name="image" id="image">
             <label class="custom-file-label" for="file">Choose file</label>
             <small class="form-text text-danger"><?= form_error('file'); ?></small>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="form-group row justify-content-end">
    <div class="col-sm-10">
      <button class="btn btn-primary btn-sm" type="submit">Edit</button>
    </div>
  </div>
</form>
</div>

</div>
