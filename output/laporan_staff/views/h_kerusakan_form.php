<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">H_kerusakan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Pelapor <?php echo form_error('id_pelapor') ?></label>
            <input type="text" class="form-control" name="id_pelapor" id="id_pelapor" placeholder="Id Pelapor" value="<?php echo $id_pelapor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Ruangan <?php echo form_error('id_ruangan') ?></label>
            <input type="text" class="form-control" name="id_ruangan" id="id_ruangan" placeholder="Id Ruangan" value="<?php echo $id_ruangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Tanggal Penyelesaian <?php echo form_error('tanggal_penyelesaian') ?></label>
            <input type="text" class="form-control" name="tanggal_penyelesaian" id="tanggal_penyelesaian" placeholder="Tanggal Penyelesaian" value="<?php echo $tanggal_penyelesaian; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Periode Penyelesaian <?php echo form_error('periode_penyelesaian') ?></label>
            <input type="text" class="form-control" name="periode_penyelesaian" id="periode_penyelesaian" placeholder="Periode Penyelesaian" value="<?php echo $periode_penyelesaian; ?>" />
        </div>
	    <input type="hidden" name="id_laporan" value="<?php echo $id_laporan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('laporan_staff') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>