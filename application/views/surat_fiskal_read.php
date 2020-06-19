
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Surat Fiskal </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Surat Fiskal </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Surat Fiskal </h4>
        </div>
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Seri <?php echo form_error('no_seri') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_seri" id="no_seri" placeholder="No Seri" value="<?php echo $no_seri; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Polisi <?php echo form_error('nomor_polisi') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_polisi" id="nomor_polisi" placeholder="Nomor Polisi" value="<?php echo $nomor_polisi; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama Pemilik <?php echo form_error('nama_pemilik') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $nama_pemilik; ?>" readonly />
                </div>
              </div>
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Merktype Kendaraan <?php echo form_error('merktype_kendaraan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="merktype_kendaraan" id="merktype_kendaraan" placeholder="Merktype Kendaraan" value="<?php echo $merktype_kendaraan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Tahuncc Kendaraan <?php echo form_error('tahuncc_kendaraan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tahuncc_kendaraan" id="tahuncc_kendaraan" placeholder="Tahuncc Kendaraan" value="<?php echo $tahuncc_kendaraan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Warna Kendaraan <?php echo form_error('warna_kendaraan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="warna_kendaraan" id="warna_kendaraan" placeholder="Warna Kendaraan" value="<?php echo $warna_kendaraan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Chasis <?php echo form_error('nomor_chasis') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_chasis" id="nomor_chasis" placeholder="Nomor Chasis" value="<?php echo $nomor_chasis; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Mesin <?php echo form_error('nomor_mesin') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_mesin" id="nomor_mesin" placeholder="Nomor Mesin" value="<?php echo $nomor_mesin; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Jenis <?php echo form_error('jenis') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="double">Bbn Kb Sebesar <?php echo form_error('bbn_kb_sebesar') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="bbn_kb_sebesar" id="bbn_kb_sebesar" placeholder="Bbn Kb Sebesar" value="<?php echo $bbn_kb_sebesar; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Bbn Kb <?php echo form_error('tanggal_bbn_kb') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_bbn_kb" id="tanggal_bbn_kb" placeholder="Tanggal Bbn Kb" value="<?php echo $tanggal_bbn_kb; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="double">Pkb Sebesar <?php echo form_error('pkb_sebesar') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pkb_sebesar" id="pkb_sebesar" placeholder="Pkb Sebesar" value="<?php echo $pkb_sebesar; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Pkb <?php echo form_error('tanggal_pkb') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_pkb" id="tanggal_pkb" placeholder="Tanggal Pkb" value="<?php echo $tanggal_pkb; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Daerah Tujuan <?php echo form_error('daerah_tujuan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="daerah_tujuan" id="daerah_tujuan" placeholder="Daerah Tujuan" value="<?php echo $daerah_tujuan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Untuk Atas Nama <?php echo form_error('untuk_atas_nama') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="untuk_atas_nama" id="untuk_atas_nama" placeholder="Untuk Atas Nama" value="<?php echo $untuk_atas_nama; ?>" readonly />
                </div>
              </div>
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat_pemilik">Alamat Pemilik <?php echo form_error('alamat_pemilik') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="alamat_pemilik" id="alamat_pemilik" placeholder="Alamat Pemilik"><?php echo $alamat_pemilik; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Swdkllj <?php echo form_error('no_swdkllj') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_swdkllj" id="no_swdkllj" placeholder="No Swdkllj" value="<?php echo $no_swdkllj; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Swdkllj <?php echo form_error('tanggal_swdkllj') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_swdkllj" id="tanggal_swdkllj" placeholder="Tanggal Swdkllj" value="<?php echo $tanggal_swdkllj; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Akhir Berlaku Swdkllj <?php echo form_error('tanggal_akhir_berlaku_swdkllj') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_akhir_berlaku_swdkllj" id="tanggal_akhir_berlaku_swdkllj" placeholder="Tanggal Akhir Berlaku Swdkllj" value="<?php echo $tanggal_akhir_berlaku_swdkllj; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pejabat Uptd <?php echo form_error('pejabat_uptd') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pejabat_uptd" id="pejabat_uptd" placeholder="Pejabat Uptd" value="<?php echo $pejabat_uptd; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pejabat Jasaraharja <?php echo form_error('pejabat_jasaraharja') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pejabat_jasaraharja" id="pejabat_jasaraharja" placeholder="Pejabat Jasaraharja" value="<?php echo $pejabat_jasaraharja; ?>" readonly />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('surat_fiskal') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
