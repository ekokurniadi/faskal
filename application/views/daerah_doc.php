<!doctype html>
<html>
    <head>
        <title>Daerah</title>
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
        <h2>Daerah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Provinsi</th>
		<th>Kabupaten</th>
		<th>Kecamatan</th>
		
            </tr><?php
            foreach ($daerah_data as $daerah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $daerah->provinsi ?></td>
		      <td><?php echo $daerah->kabupaten ?></td>
		      <td><?php echo $daerah->kecamatan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>