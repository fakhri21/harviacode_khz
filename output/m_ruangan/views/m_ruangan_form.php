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
        <h2 style="margin-top:0px">M_ruangan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">No Ruangan <?php echo form_error('no_ruangan') ?></label>
            <input type="text" class="form-control" name="no_ruangan" id="no_ruangan" placeholder="No Ruangan" value="<?php echo $no_ruangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ruangan <?php echo form_error('nama_ruangan') ?></label>
            <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="Nama Ruangan" value="<?php echo $nama_ruangan; ?>" />
        </div>
	    <input type="hidden" name="id_ruangan" value="<?php echo $id_ruangan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_ruangan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>