
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Aparatur </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Aparatur </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Aparatur </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">NIP <?php echo form_error('nip') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?php echo $nip; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pangkat <?php echo form_error('bagian') ?></label>
                <div class="col-sm-12">
               <select name="bagian" id="bagian" class="form-control">
                <option value="<?=$bagian?>" selected>Select an option</option>
               <?php foreach($pilih_pangkat as $pp):?>
                 <option value="<?=$pp->bidang?>"><?=$pp->bidang?></option>
               <?php endforeach;?>
               </select>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
                <div class="col-sm-12">
                <select name="jabatan" id="jabatan" class="form-control">
                <option value="<?=$jabatan?>" selected>Select an option</option>
               <?php foreach($pilih_jabatan as $j):?>
                 <option value="<?=$j->jabatan?>"><?=$j->jabatan?></option>
               <?php endforeach;?>
               </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Foto <?php echo form_error('foto') ?></label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('aparatur') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
