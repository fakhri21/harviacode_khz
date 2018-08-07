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
        <h2 style="margin-top:0px">M_barang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Barang <?php echo form_error('no_barang') ?></label>
            <input type="text" class="form-control" name="no_barang" id="no_barang" placeholder="No Barang" value="<?php echo $no_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_barang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>