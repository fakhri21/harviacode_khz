<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">H_kerusakan Read</h2>
        <div class="box">
        <div class="box-body">
        <table class="table">
	    <tr><td>Id Pelapor</td><td><?php echo $id_pelapor; ?></td></tr>
	    <tr><td>Id Ruangan</td><td><?php echo $id_ruangan; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Tanggal Penyelesaian</td><td><?php echo $tanggal_penyelesaian; ?></td></tr>
	    <tr><td>Periode Penyelesaian</td><td><?php echo $periode_penyelesaian; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('h_kerusakan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>