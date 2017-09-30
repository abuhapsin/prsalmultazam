<fieldset>
  	<div class="container">
  		<?php
  		foreach ($daftar_psb as $dpsb) {
  			echo "<h4>Rincian Pendaftaran Ananda <b>".strtoupper($dpsb->nama_lengkap)."</b></h2><br>
			  		<h3>Silahkan transfer biaya pendaftaran <br>
			  		<b>Rp. $dpsb->biaya_daftar</b></h4>";
  		}

  		foreach ($biaya_daftar as $b_daftar) {
  			echo "<h5>Ke rekening<b> $b_daftar->nama_bank</b><br>
  					<b>$b_daftar->no_rekening</b><br>
			  		Atas Nama
			  		<b>$b_daftar->atas_nama</b></h5>";
  		}
  		?>
  		

  		

  		<h5><b>Silahkan lakukan pembayaran untuk melengkapi data & cetak kartu peserta ujian.</b></h5><br>
  		Rincian telah kami kirimkan ke email.

  	</div>
</fieldset>



<ul class='list-group'>
	  	<li class='list-group-item list-group-item-success'>RINCIAN PENDAFTARAN</li>
	</ul>
Kode Pendaftaran : 
Nama Calon : 
Email : 
Nomor Hp : 
Tingkat : 
Tahun:

RINCIAN PEMBAYARAN
Pendaftaran : Rp. 
Transfer Ke Bank sdf 123 A.n PRS AL MuLTAZAM

Catatan. Setelah melakukan transfer, kami akan mengirimkan email konfirmasi pembayaran. Kemudian dapat login ke portal https. dengan menggunakan akun yang kami kirimkan bersamaan email konfirmasi.