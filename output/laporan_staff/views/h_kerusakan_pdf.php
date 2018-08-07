<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>H_kerusakan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Pelapor</th>
		<th>Id Ruangan</th>
		<th>Id Barang</th>
		<th>Deskripsi</th>
		<th>Tanggal</th>
		<th>Status</th>
		<th>Tanggal Penyelesaian</th>
		<th>Periode Penyelesaian</th>
		
            </tr><?php
            foreach ($laporan_staff_data as $laporan_staff)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $laporan_staff->id_pelapor ?></td>
		      <td><?php echo $laporan_staff->id_ruangan ?></td>
		      <td><?php echo $laporan_staff->id_barang ?></td>
		      <td><?php echo $laporan_staff->deskripsi ?></td>
		      <td><?php echo $laporan_staff->tanggal ?></td>
		      <td><?php echo $laporan_staff->status ?></td>
		      <td><?php echo $laporan_staff->tanggal_penyelesaian ?></td>
		      <td><?php echo $laporan_staff->periode_penyelesaian ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>