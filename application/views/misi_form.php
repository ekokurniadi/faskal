
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Misi </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Misi </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Misi </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="misi">Misi <?php echo form_error('misi') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="misi" id="misi" placeholder="Misi"><?php echo $misi; ?></textarea>
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
                    <option value="active">Non-Aktif</option>
                  </select>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('misi') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<script>
  new FroalaEditor('textarea#misi')
</script>