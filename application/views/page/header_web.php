<!DOCTYPE html>
<html lang="en">

<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet"href="<?php echo base_url()?>plugin/fonts/icomoon/style.css">

  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/bootstrap.min.css">
  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/jquery-ui.css">
  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/owl.carousel.min.css">
  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/owl.theme.default.min.css">
  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/owl.theme.default.min.css">

  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/jquery.fancybox.min.css">

  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/bootstrap-datepicker.css">

  <link rel="stylesheet"href="<?php echo base_url()?>plugin/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet"href="<?php echo base_url()?>plugin/css/aos.css">
  <link href="<?php echo base_url()?>plugin/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="<?php echo base_url()?>plugin/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2" ></span> Have a questions?</a> 
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span><?=$data_kontak['no_telp']?></a> 
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> <?=$data_kontak['email']?></a> 
          </div>
          <div class="col-lg-3 text-right">
            <a href="<?php echo base_url('auth')?>"class="small btn btn-info px-4 py-2 rounded-0" style="background-color:#7865d6"><span class="icon-users"></span> LOGIN</a>
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo" >
            <a href="<?php echo base_url('web')?>" class="d-block">
            <?php $log = $this->db->query("SELECT * FROM tentang_kami order by id DESC LIMIT 1")->row_array();?>
              <img src="<?php echo base_url().'image/'.$log['logo']?>" alt="Image" class="img-fluid" width="70px" id="logo" height="70px" >
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li <?php if($this->uri->segment('2')=='') echo "class='active'";?>>
                  <a href="<?php echo base_url('web')?>" class="nav-link text-left">Beranda</a>
                </li>
                <li class="has-children">
                  <a href="#" class="nav-link text-left">Profil</a>
                  <ul class="dropdown">
                    <li <?php if($this->uri->segment('2') =='tentang') echo "class='active'";?>><a href="<?php echo base_url('web/tentang')?>">Tentang Kami</a></li>
                    <li><a href="<?= base_url('web/sejarah')?>">Sejarah</a></li>
                    <li><a href="<?= base_url('web/visi_kami')?>">Visi</a></li>
                    <li><a href="<?= base_url('web/misi_kami')?>">Misi</a></li>
                  </ul>
                </li>
                <li  <?php if($this->uri->segment('2')=='galeri') echo "class='active'";?> >
                  <a href="<?= base_url('web/galeri')?>" class="nav-link text-left">Galeri</a>
                </li>
                <li  <?php if($this->uri->segment('2')=='informasi') echo "class='active'";?> >
                  <a href="<?= base_url('web/informasi')?>" class="nav-link text-left">Berita</a>
                </li>
                <li  <?php if($this->uri->segment('2')=='aparat') echo "class='active'";?> >
                  <a href="<?= base_url('web/aparat')?>" class="nav-link text-left">Aparatur</a>
                </li>
                <li <?php if($this->uri->segment('2')=='contact_us') echo "class='active'";?> >
                    <a href="<?php echo base_url('web/contact_us')?>" class="nav-link text-left">Kontak Kami</a>
                  </li>
              </ul>                                                                                                                    </ul>
            </nav>
          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="<?php echo base_url()?>" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
        </div>
      </div>
    </header>