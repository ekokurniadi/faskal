<body onload="load_data_temp()"></body>

</style>

<!-- Content Header (Page header) -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">
function load_data_temp()
        {
            // var hasil =$('#hasil').val();
            var no_seri  =  $("#no_seri").val();
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_fiskal/load_temp')?>",
                data:"no_seri="+no_seri,
                success:function(hasilajax){
                    $('#list_ku').html(hasilajax);
                    $("#tembusan").val('');
                    document.getElementById("tembusan").focus();
                }
            });
            
        }

         function hapus(id)
        {
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_fiskal/hapus_temp')?>",
                data:"id="+id,
                success:function(html){
                  $("#dataku"+id).hide(500);
                  load_data_temp();
                }
            });
        }

        function add_tembusan()
        {
                var no_seri     = $("#no_seri").val();
                var tembusan             = $("#tembusan").val();
            
               
            if(no_seri == '' || tembusan == '' ){
                alert("Data Belum Lengkap");
                die;
            }
            else
            {
             $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_fiskal/input_ajax')?>",
                data:"no_seri="+no_seri+"&tembusan="+tembusan,
                success:function(html){
                   load_data_temp();
                    $("#tembusan").val('');
                    document.getElementById("tembusan").focus();
                   
                }
             });
        }
      }

    </script>



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
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Seri <?php echo form_error('no_seri') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_seri" id="no_seri" placeholder="No Seri" value="<?php echo $kode; ?>" readonly/>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $kode2; ?>"/>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Polisi <?php echo form_error('nomor_polisi') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_polisi" id="nomor_polisi" placeholder="Nomor Polisi" value="<?php echo $nomor_polisi; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama Pemilik <?php echo form_error('nama_pemilik') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $nama_pemilik; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Merk/Type Kendaraan <?php echo form_error('merktype_kendaraan') ?></label>
                <div class="col-sm-12">
                  <select name="merktype_kendaraan" id="merktype_kendaraan" class="form-control">
                  <option value="<?=$merktype_kendaraan?>"selected>Select an option</option>
                  <?php foreach($pilih_merk as $merk):?>
                     <option value="<?=$merk->tipe_kendaraan?>"><?=$merk->tipe_kendaraan?></option>
                  <?php endforeach;?>
                  </select>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Tahun/CC Kendaraan <?php echo form_error('tahuncc_kendaraan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tahuncc_kendaraan" id="tahuncc_kendaraan" placeholder="Tahun/CC Kendaraan" value="<?php echo $tahuncc_kendaraan; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Warna Kendaraan <?php echo form_error('warna_kendaraan') ?></label>
                <div class="col-sm-12">
                <select name="warna_kendaraan" id="warna_kendaraan" class="form-control">
                  <option value="<?=$warna_kendaraan?>"selected>Select an option</option>
                  <?php foreach($pilih_warna as $warna):?>
                     <option value="<?=$warna->warna?>"><?=$warna->warna?></option>
                  <?php endforeach;?>
                  </select>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Chasis <?php echo form_error('nomor_chasis') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_chasis" id="nomor_chasis" placeholder="Nomor Chasis" value="<?php echo $nomor_chasis; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Mesin <?php echo form_error('nomor_mesin') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_mesin" id="nomor_mesin" placeholder="Nomor Mesin" value="<?php echo $nomor_mesin; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Jenis <?php echo form_error('jenis') ?></label>
                <div class="col-sm-12">
                <select name="jenis" id="jenis" class="form-control">
                  <option value="<?=$jenis?>"selected>Select an option</option>
                  <?php foreach($pilih_jenis as $j):?>
                     <option value="<?=$j->jenis_kendaraan?>"><?=$j->jenis_kendaraan?></option>
                  <?php endforeach;?>
                  </select>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="double">BBN-KB Sebesar <?php echo form_error('bbn_kb_sebesar') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="bbn_kb_sebesar" id="bbn_kb_sebesar" placeholder="BBN-KB Sebesar" value="<?php echo $bbn_kb_sebesar; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal BBN-KB <?php echo form_error('tanggal_bbn_kb') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_bbn_kb" id="tanggal_bbn_kb" placeholder="Tanggal BBN-KB" value="<?php echo $tanggal_bbn_kb; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="double">PKB Sebesar <?php echo form_error('pkb_sebesar') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pkb_sebesar" id="pkb_sebesar" placeholder="PKB Sebesar" value="<?php echo $pkb_sebesar; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal PKB <?php echo form_error('tanggal_pkb') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_pkb" id="tanggal_pkb" placeholder="Tanggal PKB" value="<?php echo $tanggal_pkb; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Daerah Tujuan <?php echo form_error('daerah_tujuan') ?></label>
                <div class="col-sm-12">
                <select name="daerah_tujuan" id="daerah_tujuan" class="form-control">
                  <option value="<?=$daerah_tujuan?>"selected>Select an option</option>
                  <?php foreach($pilih_daerah as $daerah):?>
                     <option value="<?=$daerah->kabupaten?>"><?=$daerah->kabupaten?></option>
                  <?php endforeach;?>
                  </select>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Untuk Atas Nama <?php echo form_error('untuk_atas_nama') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="untuk_atas_nama" id="untuk_atas_nama" placeholder="Untuk Atas Nama" value="<?php echo $untuk_atas_nama; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat_pemilik">Alamat Pemilik <?php echo form_error('alamat_pemilik') ?></label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="alamat_pemilik" id="alamat_pemilik" placeholder="Alamat Pemilik" value="<?php echo $alamat_pemilik; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No SWDKLLJ <?php echo form_error('no_swdkllj') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_swdkllj" id="no_swdkllj" placeholder="No SWDKLLJ" value="<?php echo $no_swdkllj; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal SWDKLLJ <?php echo form_error('tanggal_swdkllj') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_swdkllj" id="tanggal_swdkllj" placeholder="Tanggal SWDKLLJ" value="<?php echo $tanggal_swdkllj; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Akhir Berlaku SWDKLLJ <?php echo form_error('tanggal_akhir_berlaku_swdkllj') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_akhir_berlaku_swdkllj" id="tanggal_akhir_berlaku_swdkllj" placeholder="Tanggal Akhir Berlaku SWDKLLJ" value="<?php echo $tanggal_akhir_berlaku_swdkllj; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pejabat Uptd <?php echo form_error('pejabat_uptd') ?></label>
                <div class="col-sm-12">
                <select name="pejabat_uptd" id="pejabat_uptd" class="form-control">
                  <option value="<?=$pejabat_uptd?>"selected>Select an option</option>
                  <?php foreach($pilih_aparatur as $aparat):?>
                     <option value="<?=$aparat->nama?>"><?=$aparat->nip?> | <?=$aparat->nama?></option>
                  <?php endforeach;?>
                  </select>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pejabat Jasaraharja <?php echo form_error('pejabat_jasaraharja') ?></label>
                <div class="col-sm-12">
                <select name="pejabat_jasaraharja" id="pejabat_jasaraharja" class="form-control">
                  <option value="<?=$pejabat_jasaraharja?>"selected>Select an option</option>
                  <?php foreach($pilih_aparatur as $aparat):?>
                     <option value="<?=$aparat->nama?>"><?=$aparat->nip?> | <?=$aparat->nama?></option>
                  <?php endforeach;?>
                  </select>
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="col-sm-12">
                  <button class="btn btn-primary btn-block btn-flat" disabled>Tembusan</button>
                </div>
              </div>

              
              <div class="form-group">
                <div class="col-sm-12">
                <div class="tabel-responsive">
                  <table>
                    <tr>
                      <td width="800px;">Tembusan
                        <input type="text" name="tembusan" id="tembusan" class="form-control">
                      </td>
                      <td>
                      <br>
                        <button type="button" class="btn btn-danger btn-sm" onclick="add_tembusan();"><i class="fa fa-plus"></i></button>
                      </td>
                    </tr>
                  </table>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <button class="btn btn-primary btn-block btn-flat" disabled>Detail Tembusan</button>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                 <div class="table-responsive">
                 <div id="list_ku"></div>
                 </div>
                </div>
              </div>
	   
	    -->
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surat_fiskal') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
