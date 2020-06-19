    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Aparatur </h2>
              <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Aparatur</span>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Aparatur </span>
            </h2>
          </div>
        </div>
        <div class="row">
            <?php foreach($data_aparat as $apart):?>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">
            <div class="feature-1 border person text-center">
                <img src="<?php echo base_url().'image/'.$apart->foto?>" alt="Image" width="100%" height="200px" style="object-fit: fill;">
              <div class="feature-1-content">
                <h2><?=$apart->nama?></h2>
                <span class="position mb-3 d-block"><?=$apart->bagian?></span>    
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p> -->
              </div>
            </div>
          </div>
            <?php endforeach;?>
        </div>
      </div>
    </div>