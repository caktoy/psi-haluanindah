<div class="well">
	<h2>Selamat Datang!</h2>
	<p>
		Ini adalah halaman website dari PT. Haluan Indah Transporindo. 
		Melalui website ini Anda dapat melakukan hubungan dengan kami untuk komunikasi mengenai layanan-layanan kami.
		Dengan website ini juga kami berusaha meningkatkan layanan yang kami berikan untuk Anda sebagai pelanggan kami,
		nikmati kemudahan layanan kami untuk mencari informasi dalam pengiriman barang Anda.
	</p>
	<p>
		<a class="btn btn-primary" href="#">
			Pelajari selengkapnya...
		</a>
	</p>
</div>
<div class="row">
	<?php
	$masuk = $this->session->userdata('status');
	if ($masuk != "masuk") {
	?>
	<div class="span5">
		<div class="well">
			<h3>Daftar Sekarang</h3>
			<p>Berbagai kemudahan yang kami tawarkan untuk Anda melalui layanan online terbaru kami. 
				Dapatkan berbagai kemudahan informasi yang Anda butuhkan disini.</p>
			<p>Daftar sekarang untuk menikmati layanan kami dengan klik 
				<a href="<?php echo base_url(); ?>index.php/page/daftar_pelanggan">disini</a>.</p>
			<!--<form class="form-search">
				<input type="text" placeholder="Nomer Resi">
				<button type="submit" class="btn btn-primary">Track</button>
			</form>-->
		</div>
	</div>
	<div class="span4">
		<div class="well">
			<h3>Biaya Pengiriman</h3>
			<p>
				Untuk melihat biaya pengiriman yang ingin Anda lakukan, silahkan masuk kehalaman 
				<a href="<?php echo base_url(); ?>index.php/page/biaya_pengiriman">Informasi Biaya Pengiriman</a> 
				atau dengan memilih tombol dibawah ini.
			</p>
			<a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/page/biaya_pengiriman">Biaya Pengiriman</a>
		</div>
	</div>
	<?php
	} else {
	?>
	<div class="span9">
		<div class="well">
			<h3>Biaya Pengiriman</h3>
			<p>
				Untuk melihat biaya pengiriman yang ingin Anda lakukan, silahkan masuk kehalaman 
				<a href="<?php echo base_url(); ?>index.php/page/biaya_pengiriman">Informasi Biaya Pengiriman</a> 
				atau dengan memilih tombol dibawah ini.
			</p>
			<a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/page/biaya_pengiriman">Biaya Pengiriman</a>
		</div>
	</div>
	<?php
	}
	?>
</div>