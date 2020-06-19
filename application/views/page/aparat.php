<div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title-underline mb-3">
              <span>Aparatur Desa</span>
            </h2>
          </div>
        </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Aparatur Desa</span>
            </h2>
          </div>
        </div>
        <div class="row">
            <?php foreach($data_aparat as $apart):?>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">
            <div class="feature-1 border person text-center">
                <img src="<?php echo base_url().'image/'.$apart->foto?>" alt="Image" width="100%" height="200px" style="object-fit: fill;">
              <div class="feature-1-content">
                <h2>Craig Daniel</h2>
                <span class="position mb-3 d-block">Math Teacher</span>    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
              </div>
            </div>
          </div>
            <?php endforeach;?>
        </div>
      </div>
    </div>