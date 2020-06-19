
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Sejarah </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Sejarah </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Sejarah </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="sejarah">Sejarah <?php echo form_error('sejarah') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="sejarah" id="sejarah" placeholder="Sejarah"><?php echo $sejarah; ?></textarea>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sejarah') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<script>
  new FroalaEditor('textarea#sejarah')
</script>