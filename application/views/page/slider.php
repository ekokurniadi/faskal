<div class="hero-slide owl-carousel site-blocks-cover" >
  
  <?php foreach($data_slider as $slide):?>      
      <div class="intro-section" style="background-image: url('<?php echo base_url().'image/'.$slide->foto?>');width:auto;height:750px;" >
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                <h1><?=$slide->title?></h1>
              </div>
            </div>
          </div>
      </div>
  <?php endforeach;?>
  
</div>
    