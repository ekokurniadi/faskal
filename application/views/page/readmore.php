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
        <span class="current"><?=$data_read['judul']?></span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p>
                        <img src="<?= base_url().'image/'.$data_read['foto']?>" alt="Image" class="img-fluid" width="400px" height="300px">
                    </p>
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                        <h2 class="section-title-underline mb-5">
                            <span><?=$data_read['judul']?></span>
                        </h2>
                        <p><?=$data_read['berita']?></p>
                        <p>
                           Post At <?=tgl_indo($data_read['tanggal_posting'])?><br>
                           Post By <?=$data_read['posted_by']?>
                        </p>

                        <p>
                            <a href="#" onclick="goBack()" class="btn btn-primary rounded-0 btn-md px-5" style="background-color:#7865d6">Kembali</a>
                        </p>
                    </div>
            </div>
        </div>
    </div>
<script>
function goBack() {
  window.history.back();
}
</script>