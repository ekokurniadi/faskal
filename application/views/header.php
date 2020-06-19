<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Company Profile &mdash;</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

   <!-- CSS Libraries -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <!-- load jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/components.css">

  <!-- komponen text area -->
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>    

 
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep "><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <?php $notif =$this->db->query("select * from pesan where status='0'")->result();?>
                <?php if($notif){?>
                  <?php foreach($notif as $psn):?>
                <a href="<?php echo base_url('pesan/read/'.$psn->id)?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                    <div class="dropdown-item-desc">
                        <?php echo substr($psn->pesan,0,10)?>...
                      <div class="time text-primary"><?php echo $psn->email_address?></div>
                      <div class="time text-primary"> Read More...</div>
                    </div>
                    <?php endforeach;?>
                    <?php }else{ ?>
                  <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                      <div class="dropdown-item-desc">
                        No Message
                      </div>
                      <?php } ?>
                    </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?php echo base_url('pesan')?>">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <?php 
          $id=$_SESSION['id'];
          $foto = $this->db->query("select foto from user where id='$id'")->row_array();
          if($foto['foto'] ==''){?>
            <img alt="image" src="<?php echo base_url()?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
          <?php } else{ ?>
            <img alt="image" src="<?php echo base_url().'image/'.$foto['foto']?>" class="rounded-circle mr-1">
          <?php }?>
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo ucwords($_SESSION['nama'])?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo base_url('user/read/'.$_SESSION['id'])?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?php echo base_url('user/update/'.$_SESSION['id'])?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Changes Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
           <a href="#" class="shadow-light">Control Panel</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <img src="<?= base_url()?>image/logo1580067792.png" alt="" width="40px">
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url('dashboard')?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-building"></i> <span>Profil</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('user')?>">User</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('visi')?>">Visi</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('misi')?>">Misi</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('sejarah')?>">Sejarah</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('tentang_kami')?>">Tentang Kami</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('kontak')?>">Kontak Kami</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('aparatur')?>">Aparatur</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('bidang_kerja')?>">Pangkat</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('jabatan')?>">Jabatan</a></li>
                </ul>
              </li> 
              <li class="menu-header">Konten</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-building"></i> <span>Kelola Konten</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('kategori_berita')?>">Kategori Berita</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('berita')?>">Kelola Berita</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('slider')?>">Slider</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('galeri')?>">Galeri</a></li>
                </ul>
              </li> 

              <li class="menu-header">Surat</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Kelola Data Fiskal</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('daerah')?>">Data Daerah</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('warna')?>">Data Warna Kendaraan</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('jenis_kendaraan')?>">Data Jenis Kendaraan</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('tipe_kendaraan')?>">Data Tipe Kendaraan</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('surat_fiskal')?>">Surat Fiskal</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('arsip')?>">Cetak Surat Fiskal (Arsip)</a></li>
                </ul>
              </li> 

            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?= base_url('pesan')?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-inbox"></i> Pesan
              </a>
            </div>
        </aside>
      </div>