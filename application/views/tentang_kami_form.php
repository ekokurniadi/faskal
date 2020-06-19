
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Tentang Kami </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Tentang Kami </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Tentang Kami </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Logo <?php echo form_error('logo') ?></label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="tentang_kami">Tentang Kami <?php echo form_error('tentang_kami') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="tentang_kami" id="tentang_kami" placeholder="Tentang Kami"><?php echo $tentang_kami; ?></textarea>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tentang_kami') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<script>
  new FroalaEditor('textarea#tentang_kami')
</script>