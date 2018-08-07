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
        <h2 style="margin-top:0px">M_pelapor <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Npm <?php echo form_error('npm') ?></label>
            <input type="text" class="form-control" name="npm" id="npm" placeholder="Npm" value="<?php echo $npm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Firstname <?php echo form_error('firstname') ?></label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lastname <?php echo form_error('lastname') ?></label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>" />
        </div>
	    <div class="form-group">
            <label for="set">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
        </div>
	    <input type="hidden" name="id_pelapor" value="<?php echo $id_pelapor; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_pelapor') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>