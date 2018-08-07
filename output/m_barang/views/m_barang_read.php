<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">M_barang Read</h2>
        <div class="box">
        <div class="box-body">
        <table class="table">
	    <tr><td>No Barang</td><td><?php echo $no_barang; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('m_barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>