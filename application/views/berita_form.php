
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Berita </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Berita </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Berita </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Kategori Berita <?php echo form_error('id_kategori') ?></label>
                <div class="col-sm-12">
                 <select name="id_kategori" id="id_kategori" class="form-control">
                 <option value="<?=$id_kategori?>" selected>Select an option</option>
                 <?php foreach($data_kategori as $kate):?>
                  <option value="<?=$kate->id?>"><?=$kate->kategori_berita?></option>
                 <?php endforeach?>
                 </select>
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Judul <?php echo form_error('judul') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Berita" value="<?php echo $judul; ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="berita">Berita <?php echo form_error('berita') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="berita" id="berita" placeholder="Berita"><?php echo $berita; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Posting <?php echo form_error('tanggal_posting') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_posting" id="tanggal_posting" placeholder="Tanggal Posting" value="<?php echo $tanggal_posting; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Posted By <?php echo form_error('posted_by') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="posted_by" id="posted_by" placeholder="Posted By" value="<?php echo $posted_by; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Foto <?php echo form_error('foto') ?></label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Active <?php echo form_error('active') ?></label>
                <div class="col-sm-12">
                <select name="active" id="active" class="form-control">
                  <?php 
                    $a="";
                    if ($active==""){
                      $a="Select an option";
                    }else{
                      $a=$active;
                    }
                  ?>
                    <option value="<?=$active?>" selected><?=$a?></option>
                    <option value="active">Aktif</option>
                    <option value="non-active">Non-Aktif</option>
                  </select>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('berita') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<script>
  new FroalaEditor('textarea#berita')
</script>