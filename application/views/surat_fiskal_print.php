<html>
       <head>
           <title>Cetak Surat Fiskal <?=$surat_data['no_surat']?></title>
           <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
           <?php $log = $this->db->query("SELECT * FROM tentang_kami order by id DESC LIMIT 1")->row_array();?>
           <link rel="shortcut icon" href="<?php echo base_url().'image/'.$log['logo']?>">  
       </head>
       <body>
          <table style="padding-bottom:-20px;">
               <tr>
               <th width="200px;"><img src="image/logo1580067792.png" alt="Image" width="80px" id="logo" height="80px" ></th>
                <th colspan="2" style="font-family:sans-serif;text-align:center;">
                    <h4 style="padding-bottom:-20px;">PEMERINTAH PROVINSI JAMBI</h4>
                    <br>
                    <h2 style="font-family:sans-serif;padding-bottom:-40px;">BADAN KEUANGAN DAERAH</h2>
                    <br>
                    <h5 style="font-family:sans-serif;padding-bottom:-40px;">UPTD PENGELOLAAN PENDAPATAN DAERAH</h5>
                    <br>
                    <h6 style="font-family:sans-serif;padding-bottom:-80px;font-weight:normal">Jl. Gajah Mada No. 23, Lb. Bandung, Kel. Jelutung, Kota Jambi, Jambi 36124</h6>
                    <br>
                    <h6 style="font-family:sans-serif;padding-top:-8px;font-weight:normal">Telp (0741) 23352, Fax (0741) 23352, Website :www.jambisamsat.net</h6>
                </th>
                <th width="100px;"><h1></h1></th>
               </tr>
                <tr>
                    <th colspan="4" style="padding-top:-30px;"><hr style="border: 1.5px solid black;"></th>
                </tr>
          </table>
          <table style="padding-bottom:-50px;">
               <tr>
                <td width="520px"><p style="font-family:sans-serif;text-align:right;font-size:14px;">No. Seri :</p></td>
                <td><p style="font-family:sans-serif;text-align:right;font-size:14px;"><?=$surat_data['no_seri']?></p></td>
               </tr>
          </table>
          <table>
               <tr>
                <td width="700px">
                    <p style="font-family:sans-serif;text-align:center;font-size:16px;font-weight:bold;padding-bottom:-15px;">SURAT KETERANGAN FISKAL ANTAR DAERAH</p>
                    <br>
                    <p style="font-family:sans-serif;text-align:center;font-size:16px;font-weight:normal">Nomor : <?=$surat_data['no_surat']?></p>
                </td>
               </tr>
          </table>
          <br>
          <table>
               <tr>
                    <td width="40px;">
                        <p style="font-family:sans-serif;text-align:justify;font-size:14px;font-weight:normal;"></p
                        >
                    </td>
                    <td>
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Kepala Badan Keuangan Daerah Provinsi Jambi dengan ini menerangkan bahwa kendaraan </p>    
                    </td>
                    <tr>
                    
                    <td colspan="2"><p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;padding-top:-25px;">bermotor berikut ini :</p></td>
                    </tr>
               </tr>
          </table>
          <table style="padding-left:40px;padding-top:-30px;">
               <tr>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">1. </p>  
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Nomor Polisi</p>  
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$surat_data['nomor_polisi']?></p>  
                    </td>
                  
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">2. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Nama Pemilik</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$surat_data['nama_pemilik']?></p>  
                    </td>
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">3. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Alamat</p>  
                    </td>
                    <td style="padding-top:-25px;font-size:12px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>    
                    <td style="padding-top:-25px;font-size:12px;font-family:sans-serif"> 
                    <p><?=strtoupper($surat_data['alamat'])?></p>
                    </td>    
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">4. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Merk/Type Kendaraan</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=strtoupper($surat_data['merktype_kendaraan'])?></p>  
                    </td>
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">5. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Tahun/CC Kendaraan</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$surat_data['tahuncc_kendaraan']?></p>  
                    </td>
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">6. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Warna Kendaraan</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=strtoupper($surat_data['warna_kendaraan'])?></p>  
                    </td>
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">7. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Nomor Chasis</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$surat_data['nomor_chasis']?></p>  
                    </td>
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">8. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Nomor Mesin</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$surat_data['nomor_mesin']?></p>  
                    </td>
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">9. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Jenis</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=strtoupper($surat_data['jenis'])?></p>  
                    </td>
               </tr>
          </table>
          <table>
            <tr>
                <td colspan="2" width="100px;">
                    <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Telah melunasi </p>  
                </td>
            </tr>
          </table>
          <table style="padding-left:40px;padding-top:-30px;">
               <tr>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">1. </p>  
                    </td>
                    <td width="120px"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">BBN-KB sebesar</p>  
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td width="120px"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Rp. <?php echo number_format($surat_data['bbn_kb_sebesar'],0,',','.')?></p>  
                    </td>
                    <td width="120px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Tanggal</p>  
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?php echo formatTanggal($surat_data['tanggal_bbn_kb'])?></p>  
                    </td>
                  
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">2. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">PKB sebesar</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Rp. <?php echo number_format($surat_data['pkb_sebesar'],0,',','.')?></p>  
                    </td>
                    <td width="80px;" style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">s/d Tanggal</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?php echo formatTanggal($surat_data['tanggal_pkb'])?></p>  
                    </td>
                  
               </tr>
            </table>
            <br>
            <table>
            <tr>
                <td colspan="2" width="100px;">
                    <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Keterangan ini diberikan berhubungan kendaraan tersebut akan dipindahkan ke </p>  
                </td>
            </tr>
            </table>
            <table style="padding-left:40px;padding-top:-30px;">
               <tr>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">1. </p>  
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Daerah tujuan</p>  
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=strtoupper($surat_data['daerah_tujuan'])?></p>  
                    </td>
                 
                  
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">2. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Untuk atas nama</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$surat_data['untuk_atas_nama']?></p>  
                    </td>
                  
                  
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">3. </p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Alamat pemilik</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">:</p>
                    </td>
                    <td style="padding-top:-25px;font-size:12px;font-family:sans-serif"> 
                        <p><?=strtoupper($surat_data['alamat_pemilik'])?></p>
                    </td>   
               </tr>
            </table>
            <table>
            <tr>
                <td colspan="2" width="100px;" style="padding-top:-15px;">
                    <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Demikian agar yang berkepentingan maklum </p>  
                </td>
            </tr>
            </table>
            <table>
            <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">*) </p>  
                    </td>
                    <td width="200px;" style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Catatan</p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"></p>
                    </td>
                    <td style="padding-top:-25px;font-size:12px;font-family:sans-serif"width="200px;"> 
                       <p></p>
                    </td>    
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"></p>  
                    </td>
                    <td width="200px;" style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Kanu dan/atau Sertifikat SWDKLLJ</p>  
                    </td>
                    <td style="padding-top:-25px;" width="230px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"></p>
                    </td>
                    <td style="padding-top:-25px;font-size:13px;font-family:sans-serif;font-weight:bold;" width="200px;"> 
                       <p><?php echo tgl_indo($surat_data['tanggal_surat'])?></p>
                    </td>    
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"></p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">No.</p>  
                    </td>
                    <td style="padding-top:-25px;padding-left:-180px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;text-decoration:underline"><?=$surat_data['no_swdkllj']?></p>
                    </td>
                    <td style="padding-top:-25px;padding-left:-355px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Tanggal</p>
                    </td>
                    <td style="padding-top:-25px;padding-left:-510px;font-size:12px;font-family:sans-serif;font-weight:normal;" width="100px;"> 
                       <p style="text-decoration:underline"><?php echo formatTanggal($surat_data['tanggal_swdkllj'])?></p>
                    </td>    
               </tr>
               <tr>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"></p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Berlaku sampai dengan</p>  
                    </td>
                    <td style="padding-top:-25px;padding-left:-72px;font-size:12px;font-family:sans-serif;font-weight:normal;" width="100px;"> 
                       <p style="text-decoration:underline"><?php echo formatTanggal($surat_data['tanggal_akhir_berlaku_swdkllj'])?></p>
                    </td>
               </tr>
            </table>

            <table style="padding-left:15px;padding-top:-25px;">
               <tr>
                    <td width="330px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Kepala Perwakilan PT. Asuransi</p>  
                    </td>
                    <td style="padding-top:-15px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">an. Kepala Badan Keuangan Daerah Provinsi Jambi</p>
                    </td>
               </tr>
               <tr>
                    <td width="330px;" style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Keuangan Jasaraharja</p>  
                    </td>
                    <td style="padding-top:-40px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">UPTD-PPD Kota Jambi</p>
                    </td>
               </tr>
               </table>
               <br>
               <br>
               <br>
               <table style="padding-left:15px;padding-top:25px;">
               <tr>
                    <td width="330px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;text-decoration:underline;"><?=$surat_data['pejabat_jasaraharja']?></p>  
                    </td>
                    <td style="padding-top:0px;"> 
                        <p style="font-family:sans-serif;text-decoration:underline;text-align:justify;font-size:12px;font-weight:normal;text-decoration:underline;"><?=$surat_data['pejabat_uptd']?></p>
                    </td>
               </tr>
               
               <?php 
               $jasa=$surat_data['pejabat_jasaraharja'];
               $data_pejabat=$this->db->query("SELECT nip FROM aparatur where nama='$jasa'")->row_array();
               $uptd=$surat_data['pejabat_uptd'];
               $data_uptd=$this->db->query("SELECT nip,bagian from aparatur where nama='$uptd'")->row_array();
               ?>
               <tr>
                    <td width="330px;" style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">NIP. <?=$data_pejabat['nip']?></p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Pangkat : <?= $data_uptd['bagian']?></p>
                    </td>
               </tr>
               <tr>
                    <td width="330px;" style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"></p>  
                    </td>
                    <td style="padding-top:-25px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">NIP</p>
                    </td>
                    <td style="padding-top:-25px;padding-left:-73px;"> 
                        <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">: <?= $data_uptd['nip']?></p>
                    </td>
               </tr>
               </table>

               <br>
               <br>
               <br>
               <br>
               <table>
            <tr>
                <td colspan="2" width="100px;" style="padding-top:-25px;">
                    <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:bold;">Tembusan :</p>  
                </td>
            </tr>
            <?php $data_tembusan=$this->db->query("select * from detail_surat_fiskal where no_seri='$surat_data[no_seri]'")->result();?>
            <?php $no =1;
            foreach($data_tembusan as $tem):?>
            <tr>
            <td style="padding-top:-25px;"> 
                <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$no++?>.</p>  
            </td>
            <td width="200px;" style="padding-top:-25px;padding-left:-30px;"> 
                <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;"><?=$tem->tembusan?></p>  
            </td>
            </tr>
            <?php endforeach;?>
            </table>
       </body>
       </html>