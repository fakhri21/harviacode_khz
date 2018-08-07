<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">M_pelapor Read</h2>
        <div class="box">
        <div class="box-body">
        <table class="table">
	    <tr><td>Npm</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Firstname</td><td><?php echo $firstname; ?></td></tr>
	    <tr><td>Lastname</td><td><?php echo $lastname; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('m_pelapor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>