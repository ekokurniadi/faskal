
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Surat fiskal </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Surat fiskal </a></div>
    </div>
  </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  
                    <!-- 0 -->
                    <div class="col-md-4">
                      <?php echo anchor(site_url('surat_fiskal/create'),'<i class="fa fa-plus"></i> Add New', 'class="btn btn-icon icon-left btn-primary"'); ?>
                    </div>

                  <div class="col-md-4 text-center">
                      <div style="margin-top: 8px" id="message">
                       <h5> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h5>
                      </div>
                  </div>

                  <div class="col-md-1 text-right">
                  </div>

                  <div class="col-md-3 text-right">
                     <form action="<?php echo site_url('surat_fiskal/index'); ?>" class="form-inline" method="get">
                          <div class="input-group">
                          <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="Enter Keyword">
                          <span class="input-group-btn">
                              <?php 
                                  if ($q <> '')
                                  {
                                      ?>
                                      <a href="<?php echo site_url('surat_fiskal'); ?>" class="btn btn-warning"><span class="fa fa-close"> </span> Reset</a>
                                      <?php
                                  }
                              ?>
                            <button class="btn btn-primary" type="submit"><span class="fa fa-search"> </span> Search</button>
                          </span>
                          </div>
                      </form>
                  </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md" id="table-1">
                      <thead>
                      <tr>
                          <th>No</th>
		<th>No Seri</th>
		<th>No Surat</th>
		<th>Nomor Polisi</th>
		<th>Nama Pemilik</th>
		<th>Alamat</th>
		<!-- <th>Merktype Kendaraan</th>
		<th>Tahuncc Kendaraan</th>
		<th>Warna Kendaraan</th>
		<th>Nomor Chasis</th>
		<th>Nomor Mesin</th>
		<th>Jenis</th>
		<th>Bbn Kb Sebesar</th>
		<th>Tanggal Bbn Kb</th>
		<th>Pkb Sebesar</th>
		<th>Tanggal Pkb</th>
		<th>Daerah Tujuan</th>
		<th>Untuk Atas Nama</th>
		<th>Alamat Pemilik</th>
		<th>Tanggal Surat</th>
		<th>No Swdkllj</th>
		<th>Tanggal Swdkllj</th>
		<th>Tanggal Akhir Berlaku Swdkllj</th>
		<th>Pejabat Uptd</th>
		<th>Pejabat Jasaraharja</th> -->
		<th>Action</th>
                    </tr>
                    </thead><?php
                    foreach ($surat_fiskal_data as $surat_fiskal)
                    {
                        ?>
                          <tbody>
                          <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $surat_fiskal->no_seri ?></td>
			<td><?php echo $surat_fiskal->no_surat ?></td>
			<td><?php echo $surat_fiskal->nomor_polisi ?></td>
			<td><?php echo $surat_fiskal->nama_pemilik ?></td>
			<td><?php echo $surat_fiskal->alamat ?></td>
			<!-- <td><?php echo $surat_fiskal->merktype_kendaraan ?></td>
			<td><?php echo $surat_fiskal->tahuncc_kendaraan ?></td>
			<td><?php echo $surat_fiskal->warna_kendaraan ?></td>
			<td><?php echo $surat_fiskal->nomor_chasis ?></td>
			<td><?php echo $surat_fiskal->nomor_mesin ?></td>
			<td><?php echo $surat_fiskal->jenis ?></td>
			<td><?php echo $surat_fiskal->bbn_kb_sebesar ?></td>
			<td><?php echo $surat_fiskal->tanggal_bbn_kb ?></td>
			<td><?php echo $surat_fiskal->pkb_sebesar ?></td>
			<td><?php echo $surat_fiskal->tanggal_pkb ?></td>
			<td><?php echo $surat_fiskal->daerah_tujuan ?></td>
			<td><?php echo $surat_fiskal->untuk_atas_nama ?></td>
			<td><?php echo $surat_fiskal->alamat_pemilik ?></td>
			<td><?php echo $surat_fiskal->tanggal_surat ?></td>
			<td><?php echo $surat_fiskal->no_swdkllj ?></td>
			<td><?php echo $surat_fiskal->tanggal_swdkllj ?></td>
			<td><?php echo $surat_fiskal->tanggal_akhir_berlaku_swdkllj ?></td>
			<td><?php echo $surat_fiskal->pejabat_uptd ?></td>
			<td><?php echo $surat_fiskal->pejabat_jasaraharja ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('surat_fiskal/detail/'.$surat_fiskal->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-icon icon-left btn-light')); 
        echo '  '; 
				echo anchor(site_url('surat_fiskal/cetak_surat/'.$surat_fiskal->id),'<i class="fa fa-print"></i>','title="print" class="btn btn-icon icon-left btn-success" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				echo '  '; 
				echo anchor(site_url('surat_fiskal/update/'.$surat_fiskal->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-icon icon-left btn-warning')); 
				echo '  '; 
        echo anchor(site_url('surat_fiskal/delete/'.$surat_fiskal->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-icon icon-left btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr></tbody>
                          <?php
                      }
                      ?>
                    
                    </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                  <?php echo $pagination ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
            
		<?php echo anchor(site_url('surat_fiskal/excel'), '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-icon btn-success"'); ?>
		<?php echo anchor(site_url('surat_fiskal/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-icon btn-info"'); ?>
	    </div>
       
    </div>
      </div>
      