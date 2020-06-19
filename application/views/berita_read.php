
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
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Id Kategori <?php echo form_error('id_kategori') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" readonly />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Judul</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Berita" value="<?php echo $judul; ?>" />
                </div>
              </div>
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="berita">Berita <?php echo form_error('berita') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="berita" id="berita" placeholder="Berita"><?php echo $berita; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Posting <?php echo form_error('tanggal_posting') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_posting" id="tanggal_posting" placeholder="Tanggal Posting" value="<?php echo $tanggal_posting; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Posted By <?php echo form_error('posted_by') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="posted_by" id="posted_by" placeholder="Posted By" value="<?php echo $posted_by; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Foto <?php echo form_error('foto') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Active <?php echo form_error('active') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" readonly />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('berita') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
