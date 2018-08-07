<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">M_ruangan Read</h2>
        <div class="box">
        <div class="box-body">
        <table class="table">
	    <tr><td>No Ruangan</td><td><?php echo $no_ruangan; ?></td></tr>
	    <tr><td>Nama Ruangan</td><td><?php echo $nama_ruangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('m_ruangan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>