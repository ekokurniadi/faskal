<!doctype html>
<html>
    <head>
        <title>Tipe Kendaraan</title>
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
        <h2>Tipe Kendaraan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tipe Kendaraan</th>
		
            </tr><?php
            foreach ($tipe_kendaraan_data as $tipe_kendaraan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tipe_kendaraan->tipe_kendaraan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>