<script type="text/javascript">
	var bb="<?php echo base_URL()?>psb_daftar/";
	function cekkec(id, tampil) {
		var id;
		var tampil; 

		var key = $("#" + id).val();
		var val = $("#" + id).attr("val");
		var ajx = $.ajax
				({
					url: bb + "cekkab", 
					data: "kab=" + key + "&id=" + id,
					cache: false,
					beforeSend: function (msg) {
						$("#" + tampil).html("<i class='fa fa-cog fa-spin'></i><small><br>memuat data...</small>");
					},
					success: function (msg) {
						$("#" + tampil).html(msg);
					}
				});
	}

	function cekkel(id, tampil) {
		var id;
		var tampil; 

		var key = $("#" + id).val();
		var val = $("#" + id).attr("val");
		var ajx = $.ajax
				({
					url: bb + "cekkab", 
					data: "kec=" + key + "&id=" + id,
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


<?php
$id_prov=$this->input->get(prov); ;
$id_kab=$this->input->get(kab); ;
$id_kec=$this->input->get(kec); ;

if ($id_prov != ""){
?>
	<div class="form-group">
		<label class="col-sm-2" style="width: 20%;">Kabupaten</label>
		<div class="col-xs-3" style="width: 40%;">
			<select class="form-control select2 " style="width: 40%;" name='kab' id='kab' onchange="cekkec('kab','loadData2');"  required>
				<option value=''>---Pilih---</option>
				<?php
				foreach($kabupaten as $kabup){ 
					echo '<option value="'.$kabup->id_kab.'">'.$kabup->nama.'</option>';
				}

				?>
			</select>
		</div>
	</div>
	<div id="loadData2"></div>
<?php } else if (($id_prov == "") && ($id_kab != "")) { ?>
	<div class="form-group">
		<label class="col-sm-2" style="width: 20%;">Kecamatan</label>
		<div class="col-xs-3" style="width: 40%;">
			<select class="form-control select2 " style="width: 40%;" name='kec' id='kec' onchange="cekkel('kec','loadData3');"  required>
				<option value=''>---Pilih---</option>
				<?php
				foreach($kecamatan as $kec){ 
					echo '<option value="'.$kec->id_kec.'">'.$kec->nama.'</option>';
				}

				?>
			/select>
		</div>
	</div>
	<div id="loadData3"></div>
<?php } else if (($id_prov == "") && ($id_kab == "") && ($id_kec != "")) { ?>
	<div class="form-group">
		<label class="col-sm-2" style="width: 20%;">Desa/Kel</label>
		<div class="col-xs-3" style="width: 40%;">
			<select class="form-control select2 " style="width: 40%;" name='kel'  required>
				<option value=''>---Pilih---</option>
				<?php
				foreach($kelurahan as $kel){ 
					echo '<option value="'.$kel->id_kel.'">'.$kel->nama.'</option>';
				}

				?>
			</select>
		</div>
	</div>
<?php } ?>