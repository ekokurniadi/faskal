    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5" >
            <h2 class="section-title-underline mb-5" >
              <span >Bidang Kerja</span>
            </h2>
          </div>
        </div>
        <div class="row">
        <?php foreach($data_bidang as $bid):?>
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0" style="padding-bottom:15px;padding-top:15px">
              <div class="feature-1 border">
                  <div class="icon-wrapper" style="background-color:#7865d6">
                    <span class="<?=$bid->icons?> text-white"></span>
                  </div>
                  <div class="feature-1-content">
                    <h2><?=$bid->bidang?></h2>
                    <p><a href="<?php echo base_url('web/bidang/'.$bid->id)?>" class="btn btn-primary px-4 rounded-0" style="background-color:#7865d6">Selengkapnya</a></p>
                  </div>
              </div>
          </div>
        <?php endforeach;?>
        </div>
      </div>
      <br>
      <br>
          <div class="section-bg style-1" style="background-image: url('plugin/images/hero_1.jpg');"> 
          </div>
    </div>