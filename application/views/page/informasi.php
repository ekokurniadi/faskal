<div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title-underline mb-3">
              <span>Berita Terkini</span>
            </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              <div class="owl-slide-3 owl-carousel">
                <?php foreach($data_berita as $daber):?>
                  <div class="course-1-item">
                    <div class="img-responsive">
                      <a href="<?php echo base_url('web/readmore/'.$daber->linknya)?>"><img src="<?php echo base_url().'image/'.$daber->foto?>" alt="Image" style="height:280px"></a>
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
                <?php endforeach;?>
              </div>
      
          </div>
        </div>
      </div>
    </div>
