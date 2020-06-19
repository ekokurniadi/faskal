
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Berita </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Berita </a></div>
    </div>
  </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  
                    <!-- 0 -->
                    <div class="col-md-4">
                      <?php echo anchor(site_url('berita/create'),'<i class="fa fa-plus"></i> Add New', 'class="btn btn-icon icon-left btn-primary"'); ?>
                    </div>

                  <div class="col-md-4 text-center">
                      <div style="margin-top: 8px" id="message">
                       <h5> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h5>
                      </div>
                  </div>

                  <div class="col-md-1 text-right">
                  </div>

                  <div class="col-md-3 text-right">
                     <form action="<?php echo site_url('berita/index'); ?>" class="form-inline" method="get">
                          <div class="input-group">
                          <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="Enter Keyword">
                          <span class="input-group-btn">
                              <?php 
                                  if ($q <> '')
                                  {
                                      ?>
                                      <a href="<?php echo site_url('berita'); ?>" class="btn btn-warning"><span class="fa fa-close"> </span> Reset</a>
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
		<th>Kategori</th>
		<th>Judul</th>
		<th>Berita</th>
		<th>Tanggal Posting</th>
		<th>Posted By</th>
		<th>Foto</th>
		<th>Active</th>
		<th>Action</th>
                    </tr>
                    </thead><?php
                    foreach ($berita_data as $berita)
                    {
                      $kategori=$this->db->query("select kategori_berita from kategori_berita where id='$berita->id_kategori'")->row_array();
                      // print_r($kategori);
                      ?>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kategori['kategori_berita'] ?></td>
			<td><?php echo $berita->judul ?></td>
			<td><?php echo $berita->berita ?></td>
			<td><?php echo tgl_indo($berita->tanggal_posting) ?></td>
			<td><?php echo $berita->posted_by ?></td>
			<td><img src="<?php echo base_url().'image/'.$berita->foto ?>" alt="" width="100px"></td>
      <td style="text-align:center;">
        <?php if($berita->active=='active'):?>
          <span class="btn btn-icon btn-sm btn-success"><i class="fas fa-check"></i></span>
        <?php else:?>
          <span class="btn btn-icon btn-sm btn-danger"><i class="fas fa-exclamation-triangle"></i></span>
       <?php endif?>
    </td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('berita/read/'.$berita->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-icon icon-left btn-light')); 
				echo '  '; 
				echo anchor(site_url('berita/update/'.$berita->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-icon icon-left btn-warning')); 
				echo '  '; 
				echo anchor(site_url('berita/delete/'.$berita->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-icon icon-left btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
            
	    </div>
       
    </div>
      </div>
      