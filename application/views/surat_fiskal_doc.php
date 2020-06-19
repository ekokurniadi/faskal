<!doctype html>
<html>
    <head>
        <title>Surat Fiskal</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Surat Fiskal List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Seri</th>
		<th>No Surat</th>
		<th>Nomor Polisi</th>
		<th>Nama Pemilik</th>
		<th>Alamat</th>
		<th>Merktype Kendaraan</th>
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
		<th>Pejabat Jasaraharja</th>
		
            </tr><?php
            foreach ($surat_fiskal_data as $surat_fiskal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $surat_fiskal->no_seri ?></td>
		      <td><?php echo $surat_fiskal->no_surat ?></td>
		      <td><?php echo $surat_fiskal->nomor_polisi ?></td>
		      <td><?php echo $surat_fiskal->nama_pemilik ?></td>
		      <td><?php echo $surat_fiskal->alamat ?></td>
		      <td><?php echo $surat_fiskal->merktype_kendaraan ?></td>
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
		      <td><?php echo $surat_fiskal->pejabat_jasaraharja ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>