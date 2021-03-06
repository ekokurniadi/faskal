
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Pangkat </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Pangkat </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Pangkat </h4>
        </div>
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Icons <?php echo form_error('icons') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="icons" id="icons" placeholder="Icons" value="<?php echo $icons; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pangkat <?php echo form_error('bidang') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="bidang" id="bidang" placeholder="Bidang" value="<?php echo $bidang; ?>" readonly />
                </div>
              </div>
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
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
	    <a href="<?php echo site_url('bidang_kerja') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
