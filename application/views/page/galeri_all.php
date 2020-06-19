<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Galeri</h2>
              <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Galeri</span>
      </div>
    </div> 
 
 
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Galeri</span>
            </h2>
          </div>
        </div>
            <div class="row">
            <?php foreach($data_galeri as $glr):?>
            <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                      <div class="img-responsive">
                        <figure class="thumnail">
                                <a href="#ModalDetail<?=$glr->id?>" id="<?=$glr->id?>"  data-toggle="modal" class="data-gambar"><img src="<?= base_url().'image/'.$glr->foto?>" alt="Image" width="100%" height="200px" style="object-fit: fill;"></a>
                                <div class="category" style="background-color:#7865d6"><h3><?=$glr->deskripsi?></h3></div>
                        </figure>
                      </div>
                        <div class="course-1-content pb-4"><p><a href="#ModalDetail<?=$glr->id?>" id="<?=$glr->id?>"  data-toggle="modal" class="btn btn-danger btn-md  px-4" > <span class="fa fa-eye"></span> Preview</a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        </div>
        <br>
          <div class="section-bg style-1" style="background-image: url('plugin/images/hero_1.jpg');"> 
          </div>
    </div>
  <!-- Modal -->
  <?php foreach($data_galeri as $glr):?>
  <div class="modal fade" id="ModalDetail<?=$glr->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-user"></span>&nbsp;Galery Preview</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body" id="IsiModal" >
                <img src="<?=base_url()?>image/<?php echo isset($glr->foto)?$glr->foto:''; ?>" width="300px" height="300px" style=" display: block;margin-left: auto;margin-right: auto;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>  Tutup</button>
                </div>
            </div>
          </div>
        </div>
  <?php endforeach;?>