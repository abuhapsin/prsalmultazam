<?php
$metode_pemb=$this->input->get(metode_pemb);
if ($metode_pemb=="Cash"){
?>
	<div class="form-group">
		<label class="col-sm-2" style="width: 100%;">Nominal</label>
		<div class="col-xs-3" style="width: 20%;"><input type="text" name="nominal" class="form-control" size="20"  value='<?php foreach ($biaya_daftar as $b_daftar){ echo $b_daftar->nominal; } ?>' readonly='true'/></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" style="width: 100%;">Keterangan</label>
		<div class="col-xs-7" style="width: 70%;"><textarea name='ket' required="true" value="Pembayaran Cash melalui Bapak/Ibu ..."></textarea> </div>
	</div>
<?php
} else if ($metode_pemb=="Transfer"){
?>
	<div class="form-group">
		<label class="col-sm-2" style="width: 100%;">Nominal</label>
		<div class="col-xs-3" style="width: 30%;"><input type="text" name="nominal" class="form-control" size="20"  required='true'/></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" style="width: 100%;">Keterangan</label>
		<div class="col-xs-7" style="width: 70%;"><textarea name='ket' required="true" placeholder="Pembayaran melalui Bank .... a.n Bapak/Ibu ... pada tanggal .... jam ...."></textarea> </div>
	</div>
<?php
}
?>