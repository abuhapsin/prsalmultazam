<fieldset>
  	<div class="container">
    	<form action="<?php echo base_url('prs/simpan_update_pendaftar'); ?>" method="post" class="form-horizontal">  
			<div class="col-md-20">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li><a href="#siswa" data-toggle="tab">Siswa</a></li>
						<li><a href="#ortu" data-toggle="tab">Orang Tua</a></li>
						<li><a href="#prestasi" data-toggle="tab">Prestasi</a></li>
						<li class="active"><a href="#" data-toggle="tab"></a></li>
					</ul>
					<?php 
					foreach ($d_siswa as $dsiswa) { ?>
					<div class="tab-content">
						<div class="tab-pane" id="siswa">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Ukuran Baju</label>
									<div class="col-xs-3" style="width: 20%;" required='true'>
										<select class="form-control select2 "  name='ukuran_baju' required="true">
											<option value="">Pilih</option>
											<option value="S">S</option>
											<option value="M">M</option>
											<option value="L">L</option>
											<option value="XL">XL</option>
											<option value="XXL">XXL</option>
											<option value="XXXL">XXXL</option>
										</select>
				                    </div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">NISN</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" class="form-control" name='nisn' maxlength="12" size='10' value='<?php echo $dsiswa->nisn; ?>' readonly="true"></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Nama Lengkap</label>
									<div class="col-xs-3" style="width: 40%;"><input type="text" class="form-control" name="nama_lengkap" size="30" value='<?php echo $dsiswa->nama_lengkap; ?>'/></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Jenis Kelamin</label>
									<div class="col-xs-3" style="width: 80%;">
										<input type="radio" name="jk" id="jk" value="Laki-laki" <?php if ($dsiswa->jk=="Laki-laki"){ echo "checked"; } ?>> Laki - Laki
				                        <input type="radio" name="jk" id="jk" value="Perempuan"<?php if ($dsiswa->jk=="Perempuan"){ echo "checked"; } ?>> Perempuan
				                    </div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Tempat Lahir</label>
									<div class="col-xs-3" style="width: 30%;"><input type="text" name="tempat_lahir" class="form-control" size="20"  required='true' value='<?php echo $dsiswa->tempat_lahir; ?>'/></div>
								</div>
								<div class="form-group">
				                    <label class="col-sm-2" style="width: 100%;">Tanggal Lahir</label>
				                    <div class="col-xs-3" style="width: 20%;"><input type="date" name="tanggal_lahir" class="form-control" size="10" required='true' value='<?php echo $dsiswa->tanggal_lahir; ?>'/></div>
				                </div>
								<div class="form-group">
				                    <label class="col-sm-2" style="width: 100%;">Agama</label>
				                    <div class="col-xs-3" style="width: 60%;">
					                    <select class="form-control select2 " style="width: 30%;" name='agama'>
											<option value='Islam' <?php if ( $dsiswa->agama=="Islam"){ echo "selected"; } ?>>Islam</option>
											<option value='Kristen Protestan' <?php if ( $dsiswa->agama=="Kristen Protestan"){ echo "selected"; } ?>>Kristen Protestan</option>
											<option value='Kristen Katolik' <?php if ( $dsiswa->agama=="Kristen Katolik"){ echo "selected"; } ?>>Kristen Katolik</option>
											<option value='Hindu' <?php if ( $dsiswa->agama=="Hindu"){ echo "selected"; } ?>>Hindu</option>
											<option value='Budha' <?php if ( $dsiswa->agama=="Budha"){ echo "selected"; } ?>>Budha</option>
										</select>
									</div>
				                </div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Provinsi</label>
									<div class="col-xs-3" style="width: 40%;">
										<select class="form-control select2 " style="width: 40%;" name='prov' required='true'>
											<option value=''>---Pilih---</option>
											<?php
												foreach($provinsi as $provin){ 
													echo "<option value='".$provin->id_prov."'"; if ($provin->id_prov==$dsiswa->prov){ echo "selected"; } echo ">".$provin->nama."</option>";
												}

											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 20%;">Kabupaten</label>
									<div class="col-xs-3" style="width: 40%;">
										<select class="form-control select2 " style="width: 40%;" name='kab' id='kab' onchange="cekkec('kab','loadData2');"  required>
											<option value=''>---Pilih---</option>
											<?php
											foreach($kabupaten as $kabup){ 
												echo "<option value='".$kabup->id_kab."'"; if ($kabup->id_kab==$dsiswa->kab){ echo "selected"; } echo ">".$kabup->nama."</option>";
											}

											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 20%;">Kecamatan</label>
									<div class="col-xs-3" style="width: 40%;">
										<select class="form-control select2 " style="width: 40%;" name='kec' id='kec' onchange="cekkel('kec','loadData3');"  required>
											<option value=''>---Pilih---</option>
											<?php
											foreach($kecamatan as $kec){ 
												echo "<option value='".$kec->id_kec."'"; if ($kec->id_kec==$dsiswa->kec){ echo "selected"; } echo ">".$kec->nama."</option>";
											}

											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 20%;">Desa/Kel</label>
									<div class="col-xs-3" style="width: 40%;">
										<select class="form-control select2 " style="width: 40%;" name='kel'  required>
											<option value=''>---Pilih---</option>
											<?php
											foreach($kelurahan as $kel){ 
												echo "<option value='".$kel->id_kel."'"; if ($kel->id_kel==$dsiswa->desa){ echo "selected"; } echo ">".$kel->nama."</option>";
											}

											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Alamat</label>
									<div class="col-xs-3" style="width: 40%;"><input type="text" name="alamat" class="form-control" required='true'='true' value='<?php echo $dsiswa->alamat; ?>'/></div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">RT</label>
									<div class="col-xs-3" style="width: 10%;"><input type="text" name="rt" class="form-control" maxlength="3" required='true' value='<?php echo $dsiswa->rt; ?>'/></div>
									<label class="col-sm-4" style="width: 100%;">RW</label>
									<div class="col-xs-4" style="width: 10%;"><input type="text" name="rw" class="form-control" maxlength="3" required='true' value='<?php echo $dsiswa->rw; ?>'/></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">No.Telp</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" name="telp" class="form-control" maxlength="13" required='true' value='<?php echo $dsiswa->telepon; ?>'/></div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Email</label>
									<div class="col-xs-3" style="width: 40%;"><input type="email" name="email" class="form-control" size="10" required='true' value='<?php echo $dsiswa->email; ?>'/></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2"  style="width: 100%;">Gol.Darah</label>
									<div class="col-xs-4">
										<select class="form-control select2 " style="width: 100%;" name='gol_darah' >
											<option value=''>---Pilih---</option>
											<option value='O−'>O−</option>
											<option value='O+'>O+</option>
											<option value='A−'>A−</option>
											<option value='A+'>A+</option>
											<option value='B−'>B−</option>
											<option value='B+'>B+</option>
											<option value='AB−'>AB−</option>
											<option value='AB+'>AB+</option>
										</select>
									</div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Tinggi Badan</label>
									<div class="col-xs-3" style="width: 30%;"><input type="text" name="tinggi_badan" class="form-control" size="20"  required='true' value='<?php echo $dsiswa->tinggi; ?>'/></div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Berat Badan</label>
									<div class="col-xs-3" style="width: 30%;"><input type="text" name="berat_badan" class="form-control" size="20"  required='true' value='<?php echo $dsiswa->berat_badan; ?>'/></div>
								</div>
								<div class="form-group">
			                      	<label class="col-sm-2" style="width: 100%;">Bahasa Sehari-hari</label>
			                        <div class="col-xs-3" style="width: 70%;"><textarea class="form-control" name="bahasa" value="<?php echo $r->bahasa;  ?>" rows="3" placeholder="Bahasa Sehari-hari yang digunakan..."></textarea>
			                        </div>
			                    </div>
								<div class="form-group">
			                      	<label class="col-sm-2" style="width: 100%;">Riwayat Penyakit</label>
			                        <div class="col-xs-3" style="width: 70%;"><textarea class="form-control" name="riwayat_penyakit" value="<?php echo $r->bahasa;  ?>" rows="5" placeholder="Isi dengan penyakit yg pernah di derita"></textarea>
			                        </div>
			                    </div>
			                    <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Anak Ke-</label>
									<div class="col-xs-3" style="width: 20%;" required='true'>
										<select class="form-control select2 "  name='anakke' required="true">
											<option value="">Pilih</option>
											<?php
											for ($a=1; $a<=10; $a++){
												echo "<option value='$a'>$a</option>";
											}
											?>
										</select>
				                    </div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Saudara Kandung</label>
									<div class="col-xs-3" style="width: 20%;" required='true'>
										<select class="form-control select2 "  name='sdr_kandung'>
											<option value="">Pilih</option>
											<?php
											for ($b=1; $b<=10; $b++){
												echo "<option value='$b'>$b</option>";
											}
											?>
										</select>
				                    </div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Saudara Tiri</label>
									<div class="col-xs-3" style="width: 20%;" required='true'>
										<select class="form-control select2 "  name='sdr_tiri'>
											<option value="">Pilih</option>
											<?php
											for ($c=1; $c<=10; $c++){
												echo "<option value='$c'>$c</option>";
											}
											?>
										</select>
				                    </div>
								</div>
								<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Saudara Angkat</label>
									<div class="col-xs-3" style="width: 20%;" required='true'>
										<select class="form-control select2 "  name='sdr_angkat'>
											<option value="">Pilih</option>
											<?php
											for ($d=1; $d<=10; $d++){
												echo "<option value='$d'>$d</option>";
											}
											?>
										</select>
				                    </div>
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
							</div>
						</div>

						<div class="tab-pane" id="ortu">
							<div class="form-group">
								<label class="col-sm-2" style="width: 100%;">Nama Ayah</label>
								<div class="col-xs-3" style="width: 40%;" ><input type="text" name="nama_ayah" class="form-control" maxlength="50" value='<?php echo $dsiswa->nama_ayah; ?>'/></div>
							</div>
							<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Tempat Lahir Ayah</label>
									<div class="col-xs-3" style="width: 30%;"><input type="text" name="tempat_lahir_ayah" class="form-control" size="20"  required='true'/></div>
								</div>
								<div class="form-group">
				                    <label class="col-sm-2" style="width: 100%;">Tanggal Lahir Ayah</label>
				                    <div class="col-xs-3" style="width: 20%;"><input type="date" name="tanggal_lahir_ayah" class="form-control" size="10" required='true'/></div>
				                </div>
								<div class="form-group">
				                    <label class="col-sm-2" style="width: 100%;">Agama Ayah</label>
				                    <div class="col-xs-3" style="width: 20%;"><input type="text" name="agama_ayah" class="form-control" size="20" required='true'/></div>
				                </div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">No.Telp Ayah</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" name="telp_ayah" class="form-control" maxlength="13" required='true'/></div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Pekerjaan Ayah</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" name="pekerjaan_ayah" class="form-control" maxlength="13" required='true'/></div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Penghasilan Ayah</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" name="penghasilan_ayah" class="form-control" maxlength="13" required='true'/></div>
								</div>
							<div class="form-group">
								<label class="col-sm-2" style="width: 100%;">Nama Ibu</label>
								<div class="col-xs-3" style="width: 40%;" ><input type="text" name="nama_ibu" class="form-control" maxlength="50" value='<?php echo $dsiswa->nama_ibu; ?>'/></div>
							</div>
							<div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Tempat Lahir Ibu</label>
									<div class="col-xs-3" style="width: 30%;"><input type="text" name="tempat_lahir_ibu" class="form-control" size="20"  required='true'/></div>
								</div>
								<div class="form-group">
				                    <label class="col-sm-2" style="width: 100%;">Tanggal Lahir Ibu</label>
				                    <div class="col-xs-3" style="width: 20%;"><input type="date" name="tanggal_lahir_ibu" class="form-control" size="10" required='true'/></div>
				                </div>
								<div class="form-group">
				                    <label class="col-sm-2" style="width: 100%;">Agama Ibu</label>
				                    <div class="col-xs-3" style="width: 20%;"><input type="text" name="agama_ibu" class="form-control" size="20" required='true'/></div>
				                </div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">No.Telp Ibu</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" name="telp_ibu" class="form-control" maxlength="13" required='true'/></div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Pekerjaan Ibu</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" name="pekerjaan_ibu" class="form-control" maxlength="13" required='true'/></div>
								</div>
				                <div class="form-group">
									<label class="col-sm-2" style="width: 100%;">Penghasilan Ibu</label>
									<div class="col-xs-3" style="width: 20%;"><input type="text" name="penghasilan_ibu" class="form-control" maxlength="13" required='true'/></div>
								</div>
						</div>



						<div class="tab-pane" id="prestasi">
							<table class="table table-condensed">
									<tr>
										<th style="width: 10px">No</th>
										<th>Jenis Prestasi</th>
										<th>Tingkat Prestasi</th>
										<th>Nama Prestasi</th>
										<th>Tahun</th>
										<th>Peringkat</th>
									</tr>
										<?php
										for($i=1; $i<=5; $i++){ 
											$n++;
											echo "<tr>
													<td>$n</td>
													<td><select name='jenis_prestasi$i'>
															<option value=''>Pilih</option>
															<option value='Olahraga'>Olahraga</option>
															<option value='Seni'>Seni</option>
															<option value='Sains'>Sains</option>
															<option value='Keagamaan'>Keagamaan</option>
															<option value='Lainnya'>Lainnya</option>
														</select></td>
													<td><select name='tingkat_prestasi$i'>
															<option value=''>Pilih</option>
															<option value='Sekolah'>Sekolah</option>
															<option value='Kecamatan'>Kecamatan</option>
															<option value='Kabupaten'>Kabupaten</option>
															<option value='Provinsi'>Provinsi</option>
															<option value='Nasional'>Nasional</option>
															<option value='Internasional'>Internasional</option>
															<option value='Lainnya'>Lainnya</option>
														</select></td>
													<td><input type='text' class='form-control' name='nama_prestasi$i'></td>
													<td><input type='text' class='form-control' name='tahun_prestasi$i'></td>
													<td><input type='text' class='form-control' name='peringkat_prestasi$i'></td>
												</tr>";
										}
										?>
								</table>
								<div class="form-group">
					            	<button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="javascript: return confirm('Apakah Anda Yakin Akan Menyimpan Data Ini?')">Update</button>
					            	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
					            </div>
						</div>

<?php } ?>

					</div>
				</div>
			</div>



    
    </form>
    </div>
</fieldset>