<div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <?php $t=$this->db->query("SELECT * FROM tentang_kami order by id DESC LIMIT 1")->row_array();?>
            <p class="mb-4">  <img src="<?php echo base_url().'image/'.$t['logo']?>" alt="Image" class="img-fluid" width="80px" id="logo" height="80px" style=" filter: drop-shadow(1px 1px 1px #FFF);" ></p>
            <p style="text-align:justify;"><?=$t['tentang_kami']?></p>  
            <p><a href="<?php echo base_url('web/tentang')?>">Learn More</a></p>
          </div>
          <div class="col-lg-2">
            <h3 class="footer-heading"><span>Profil</span></h3>
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url('web/sejarah')?>">Sejarah</a></li>
                <li><a href="<?php echo base_url('web/tentang')?>">Tentang</a></li>
                <li><a href="<?php echo base_url('web/visi_kami')?>">Visi</a></li>
                <li><a href="<?php echo base_url('web/misi_kami')?>">Misi</a></li>
            </ul>
          </div>
          <div class="col-lg-2">
            <h3 class="footer-heading"><span>Berita</span></h3>
            <?php $d=$this->db->query("SELECT * FROM berita where active ='active' order by id DESC LIMIT 5 ")->result();?>
            <ul class="list-unstyled">
              <?php foreach($d as $v):?>
                <li><a href="<?php echo base_url('web/readmore/'.$v->id)?>"><?php echo $v->judul?></a></li>
              <?php endforeach;?>
            </ul>
          </div>
          <div class="col-lg-2">
            <h3 class="footer-heading"><span>Bidang Kerja</span></h3>
            <?php $bd=$this->db->query("SELECT * FROM bidang_kerja where active ='active' group by bidang order by id DESC LIMIT 5 ")->result();?>
            <ul class="list-unstyled">
            <?php foreach($bd as $vv):?>
                <li><a href="<?php echo base_url('web/bidang/'.$vv->id)?>"><?php echo $vv->bidang?></a></li>
              <?php endforeach;?>
            </ul>
          </div>

        </div>

        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
<!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="<?php echo base_url()?>plugin/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery-ui.js"></script>
  <script src="<?php echo base_url()?>plugin/js/popper.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery.countdown.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url()?>plugin/js/aos.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery.fancybox.min.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery.sticky.js"></script>
  <script src="<?php echo base_url()?>plugin/js/jquery.mb.YTPlayer.min.js"></script>




  <script src="<?php echo base_url()?>plugin/js/main.js"></script>

</body>

</html>