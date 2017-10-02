<script type="text/javascript">
	var bb="<?php echo base_URL()?>psb_daftar/";
	function cekbayar(id, tampil) {
		var id;
		var tampil; 

		var key = $("#" + id).val();
		var val = $("#" + id).attr("val");
		var ajx = $.ajax
				({
					url: bb + "cekbayar", 
					data: "metode_pemb=" + key + "&id=" + id,
					cache: false,
					beforeSend: function (msg) {
						$("#" + tampil).html("<i class='fa fa-cog fa-spin'></i><small><br>memuat data...</small>");
					},
					success: function (msg) {
						$("#" + tampil).html(msg);
					}
				});
	}
</script>

<fieldset>
  	<div class="container">
    	<form action="<?php echo base_url('psb_daftar/konf_bayar'); ?>" method="post" class="form-horizontal">  
    		<div class="form-group">
    			<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">NISN</label>
					<div class="col-xs-3" style="width: 20%;"><input type="text" class="form-control" name='nisn' maxlength="12" size='10' required='true'></div> *) <a href='http://nisn.data.kemdikbud.go.id/page/data' target="_blank">CEK NISN</a>
				</div>
				<div class="form-group">
                    <label class="col-sm-2" style="width: 100%;">Tanggal Bayar</label>
                    <div class="col-xs-3" style="width: 20%;"><input type="date" name="tgl_bayar" class="form-control" size="10" required='true'/></div>
                </div>
                <div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Metode Pembayaran</label>
					<div class="col-xs-3" style="width: 40%;">
						<select class="form-control select2 " style="width: 40%;" name='metode_pemb' id="metode_pemb" required='true' onchange="cekbayar('metode_pemb','loadData1');">
							<option value=''>---Pilih---</option>
							<option value='Cash'>Cash</option>
							<option value='Transfer'>Transfer</option>
						</select>
					</div>
				</div>
				<div id="loadData1"></div>
            	<button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="javascript: return confirm('Apakah Anda Yakin Akan Menyimpan Data Ini?')">Daftar</button>
            	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
           </div>
    	</form>
    </div>
</fieldset>