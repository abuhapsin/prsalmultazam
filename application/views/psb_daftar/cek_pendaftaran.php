<fieldset>
  	<div class="container">
    	<form action="<?php echo base_url('psb_daftar/cek_pendaftaran'); ?>" method="post" class="form-horizontal">  
    		<div class="form-group">
    			<div class="form-group">
					<label class="col-sm-1" style="width: 100%;">NISN</label>
					<div class="col-xs-2" style="width: 20%;"><input type="text" class="form-control" name='nisn' maxlength="12" size='10' required='true'></div>
            	<button type="submit" name="submit" id="submit" class="btn btn-primary">CEK</button>
           </div>
    
    </form>

    <?php
    	foreach ($daftar_psb as $d_psb) {
    		if ($d_psb->status=="Proses"){
    			$status="Terdaftar";
    		} else if ($d_psb->status=="Bayar"){
    			$status="Terkonfirmasi";
    		} else if ($d_psb->status=="Off"){
    			$status="Data Tidak Ditemukan";
    		} else {
    			$status="Data Tidak Ditemukan";
    		}

    		if ($d_psb->status != "Off"){
	    		echo "No NISN : $d_psb->nisn<br>
	    			Nama 	: $d_psb->nama_lengkap <br>
	    			Status : <b>".strtoupper($status)."</b>
	    		";
	    	}
	    }
    ?>
    </div>
</fieldset>