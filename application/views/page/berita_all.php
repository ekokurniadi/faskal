<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Berita</h2>
              <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Berita</span>
      </div>
    </div> 
 
 <div class="site-section">
        <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Berita</span>
            </h2>
          </div>
        </div>
            <div class="row">
              <?php foreach($data_berita as $daber):?>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="course-1-item">
                    <div class="img-responsive">
                      <a href="<?php echo base_url('web/readmore/'.$daber->linknya)?>"><img src="<?php echo base_url().'image/'.$daber->foto?>" alt="Image" width="100%" height="200px" style="object-fit: fill;"></a>
                      </div>
                      <div class="category" style="background-color:#7865d6"><h3><?=$daber->kategori?></h3></div>  
                    <div class="course-1-content pb-4">
                      <h2><?=$daber->judul?></h2>
                      <p class="desc mb-4"><?php echo substr($daber->berita,0,15)?>...</p>
                      <p class="desc sm-4" style="text-align:left;color:#7865d6;font-weight:normal">Post at <?php echo tgl_indo($daber->tanggal_posting)?></p>
                      <p class="desc sm-4" style="text-align:left;color:#7865d6;font-weight:normal;margin-top:-23px;">Post by <?php echo $daber->posted_by?></p>
                      <p><a href="<?php echo base_url('web/readmore/'.$daber->linknya)?>" class="btn btn-danger rounded-0 px-4">Read More</a></p>
                    </div>
                  </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>