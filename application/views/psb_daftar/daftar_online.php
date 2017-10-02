<script type="text/javascript">
	var bb="<?php echo base_URL()?>psb_daftar/";
	function cekkab(id, tampil) {
		var id;
		var tampil; 

		var key = $("#" + id).val();
		var val = $("#" + id).attr("val");
		var ajx = $.ajax
				({
					url: bb + "cekkab", 
					data: "prov=" + key + "&id=" + id,
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
    	<form action="<?php echo base_url('psb_daftar/simpan_daftar'); ?>" method="post" class="form-horizontal">  
    		<div class="form-group">
    			<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">NISN</label>
					<div class="col-xs-3" style="width: 20%;"><input type="text" class="form-control" name='nisn' maxlength="12" size='10' required='true'></div> *) <a href='http://nisn.data.kemdikbud.go.id/page/data' target="_blank">CEK NISN</a>
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Nama Lengkap</label>
					<div class="col-xs-3" style="width: 40%;"><input type="text" class="form-control" name="nama_lengkap" size="30" required='true'/></div> *)Isi sesuai Akte Kelahiran & KK
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Jenis Kelamin</label>
					<div class="col-xs-3" style="width: 80%;">
						<input type="radio" name="jk" id="jk" value="Laki-laki" checked> Laki - Laki
                        <input type="radio" name="jk" id="jk" value="Perempuan">  Perempuan
                    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Tempat Lahir</label>
					<div class="col-xs-3" style="width: 30%;"><input type="text" name="tempat_lahir" class="form-control" size="20"  required='true'/></div>
				</div>
				<div class="form-group">
                    <label class="col-sm-2" style="width: 100%;">Tanggal Lahir</label>
                    <div class="col-xs-3" style="width: 20%;"><input type="date" name="tanggal_lahir" class="form-control" size="10" required='true'/></div>
                </div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Provinsi</label>
					<div class="col-xs-3" style="width: 40%;">
						<select class="form-control select2 " style="width: 40%;" name='prov' id='prov' onchange="cekkab('prov','loadData1');"  required='true'>
							<option value=''>---Pilih---</option>
							<?php
								foreach($provinsi as $provin){ 
									echo '<option value="'.$provin->id_prov.'">'.$provin->nama.'</option>';
								}

							?>
						</select>
					</div>
				</div>
				<div id="loadData1"></div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Alamat</label>
					<div class="col-xs-3" style="width: 40%;"><input type="text" name="alamat" class="form-control" required='true'='true'/></div>
				</div>
                <div class="form-group">
					<label class="col-sm-2" style="width: 100%;">RT</label>
					<div class="col-xs-3" style="width: 10%;"><input type="text" name="rt" class="form-control" maxlength="3" required='true'/></div>
					<label class="col-sm-4" style="width: 100%;">RW</label>
					<div class="col-xs-4" style="width: 10%;"><input type="text" name="rw" class="form-control" maxlength="3" required='true'/></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">No.Telp</label>
					<div class="col-xs-3" style="width: 20%;"><input type="text" name="telp" class="form-control" maxlength="13" required='true'/></div>
				</div>
                <div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Email</label>
					<div class="col-xs-3" style="width: 40%;"><input type="email" name="email" class="form-control" size="10" required='true'/></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Nama Ayah</label>
					<div class="col-xs-3" style="width: 40%;"><input type="text" name="nama_ayah" class="form-control" maxlength="50"/></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Nama Ibu</label>
					<div class="col-xs-3" style="width: 40%;"><input type="text" name="nama_ibu" class="form-control" maxlength="50"/></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Jenjang Pendidikan di Al-Multazam</label>
					<div class="col-xs-3" style="width: 70%;" required='true'>
						<input type="radio" name="jenjang_am" value="smpit" checked> Sekolah Menengah Pertama (SMPIT)
                        <input type="radio" name="jenjang_am" value="smait"> Sekolah Menengah Atas (SMAIT) 
                    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">Sumber Informasi</label>
					<div class="col-xs-4" style="width: 80%;" required='true'>
						<input type="radio" name="sumber_info" value="Keluarga" checked> Keluarga
                        <input type="radio" name="sumber_info" value="Saudara"> Saudara 
                        <input type="radio" name="sumber_info" value="Teman"> Teman 
                        <input type="radio" name="sumber_info" value="Sekolah"> Sekolah 
                        <input type="radio" name="sumber_info" value="Brosur"> Brosur 
                        <input type="radio" name="sumber_info" value="Internet"> Internet 
                        <input type="radio" name="sumber_info" value="Iklan"> Iklan 
                    </div>
				</div>
            	<button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="javascript: return confirm('Apakah Anda Yakin Akan Menyimpan Data Ini?')">Daftar</button>
            	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
           </div>
    
    </form>
    </div>
</fieldset>