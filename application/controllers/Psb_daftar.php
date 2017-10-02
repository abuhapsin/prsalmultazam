<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Psb_daftar extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('pagination');
		$this->load->model('m_models');
		$this->load->library('email');
	}

	public function beranda(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$data['prs_info'] = $this->m_models->getwhere("*", "prs_info", "menu_info", "beranda", "no_urut", "asc");
		$this->load->view('psb_daftar/beranda', $data);
		$this->load->view('themes/footloader');
	}

	public function info_pendaftaran(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$data['prs_info'] = $this->m_models->getwhere("*", "prs_info", "menu_info", "info_pendaftaran", "no_urut", "asc");
		$this->load->view('psb_daftar/info_pendaftaran', $data);
		$this->load->view('themes/footloader');
	}

	public function biaya_pendidikan(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$data['prs_info'] = $this->m_models->getwhere("*", "prs_info", "menu_info", "biaya_pendidikan", "no_urut", "asc");
		$this->load->view('psb_daftar/biaya_pendidikan', $data);
		$this->load->view('themes/footloader');
	}

	public function ketentuan_daftar_ulang(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$data['prs_info'] = $this->m_models->getwhere("*", "prs_info", "menu_info", "ketentuan_daftar_ulang", "no_urut", "asc");
		$this->load->view('psb_daftar/ketentuan_daftar_ulang', $data);
		$this->load->view('themes/footloader');
	}
	
	public function contact_person(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$data['prs_info'] = $this->m_models->getwhere("*", "prs_info", "menu_info", "contact_person", "no_urut", "asc");
		$this->load->view('psb_daftar/contact_person', $data);
		$this->load->view('themes/footloader');
	}
	
	

	public function daftar_online(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$data['provinsi'] = $this->m_models->getTabelOrder("*", "provinsi", "nama", "asc");
		$this->load->view('psb_daftar/daftar_online',$data);

		$this->load->view('themes/footloader');
	}

	public function simpan_daftar(){ 
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$nisn = $this->input->post('nisn');
		$nama_lengkap = strtoupper(addslashes($this->input->post('nama_lengkap')));
		$jk = strtoupper(addslashes($this->input->post('jk')));
		$tempat_lahir = strtoupper(addslashes($this->input->post('tempat_lahir')));
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$prov = $this->input->post('prov');
		$kab = $this->input->post('kab');
		$kec = $this->input->post('kec');
		$kel = $this->input->post('kel');
		$alamat = strtoupper(addslashes($this->input->post('alamat')));
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$telp = $this->input->post('telp');
		$email = strtolower(addslashes($this->input->post('email')));
		$nama_ayah = strtoupper(addslashes($this->input->post('nama_ayah')));
		$nama_ibu = strtoupper(addslashes($this->input->post('nama_ibu')));
		$jenjang_am = $this->input->post('jenjang_am');
		$sumber_info = $this->input->post('sumber_info');
		$jml_urut = $this->m_models->getRows('daftar_psb');
		//menambahkan angka nol
		$jbiaya=$jml_urut+1;
		if($jbiaya < 10) {
			$nourut = '000'.$jbiaya;
		}else if($jbiaya < 100)	{
			$nourut = '00'.$jbiaya;
		}else if($jbiaya < 1000){
			$nourut = '0'.$jbiaya;
		}else {
			$nourut = $jbiaya;
		}
		

		$data['biaya_daftar'] = $this->m_models->getwhere("*", "biaya_daftar", "status", "on", "nominal", "asc");
		foreach ($data['biaya_daftar'] as $biaya) {
			$nom_biaya=$biaya->nominal;
		}
		$nominal_biaya=$nourut+$nom_biaya;
		$hariini=date("Y-m-d");
		$jam=date("H:i:s");


		//kirim email
  		$htmlContent="<h4>Rincian Pendaftaran Ananda <b>".strtoupper($nama_lengkap)."</b></h2><br>
			  		<h3>Silahkan transfer biaya pendaftaran <br>
			  		<b>Rp. $dpsb->biaya_daftar</b></h4><br><br>
			  		<h5>Ke rekening<b> $data[biaya_daftar][0]->nama_bank</b><br>
  					<b>$b_daftar->no_rekening</b><br>
			  		Atas Nama
			  		<b>$data[biaya_daftar][0]->atas_nama</b></h5>";
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->to($email);
		$this->email->from('tes@gmail.com','AL MULTAZAM');
		$this->email->subject('Test Email (HTML)');
		$this->email->message($htmlContent);
		$this->email->send();
		
		$jnisn = $this->m_models->getRowsWhere("*", "daftar_psb", "nisn", $nisn, "nama_lengkap", "asc");
		if ($jnisn==0){
			if (($nisn != "") && ($nama_lengkap != "") && ($jk != "")){
				$siswa=array('id_daftar_psb' => $nourut, 'nisn' => $nisn, 'nama_lengkap' => $nama_lengkap, 'jk' => $jk, 'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'prov' => $prov, 'kab' => $kab, 'kec' => $kec, 'kel' => $kel, 'alamat' => $alamat, 'rt' => $rt, 'rw' => $rw, 'telp' => $telp, 'email' => $email, 'nama_ayah' => $nama_ayah, 'nama_ibu' => $nama_ibu, 'jenjang_am' => $jenjang_am, 'sumber_info' => $sumber_info, 'biaya_daftar' => $nominal_biaya, 'status'=>'Proses', 'tgl_input'=>$hariini, 'wkt_input'=>$jam);
				$data['daftar'] = $this->m_models->save_data($siswa, "daftar_psb");
				//redirect('prs/simpan_daftar');
				$data['daftar_psb'] = $this->m_models->getwhere("*", "daftar_psb", "biaya_daftar", $nominal_biaya, "nama_lengkap", "asc");
				$this->load->view('psb_daftar/simpan_daftar',$data);
			} 
		} else {
			echo "<script type = 'text/javascript'>BootstrapDialog.alert('Afwan NISN sudah ada!!!'); </script>";
			$data['daftar_psb'] = $this->m_models->getwhere("*", "daftar_psb", "biaya_daftar", $nominal_biaya, "nama_lengkap", "asc");
			$this->load->view('psb_daftar/daftar_online',$data);
		}
		$this->load->view('themes/footloader');
	}


	public function cekkab(){
		$id_prov=$this->input->get(prov); 
		$id_kab=$this->input->get(kab); 
		$id_kec=$this->input->get(kec); 
		$data['kabupaten'] = $this->m_models->getwhere("*", "kabupaten", "id_prov", $id_prov, "nama", "asc");
		$data['kecamatan'] = $this->m_models->getwhere("*", "kecamatan", "id_kab", $id_kab, "nama", "asc");
		$data['kelurahan'] = $this->m_models->getwhere("*", "kelurahan", "id_kec", $id_kec, "nama", "asc");
		$this->load->view('psb_daftar/cekkab',$data);
	}



	
	public function cek_pendaftaran(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$nisn=$this->input->post(nisn);
		if ($nisn != ""){
			$data['daftar_psb'] = $this->m_models->getwhereGroup("*", "daftar_psb", "nisn", $nisn, "nisn", "nama_lengkap", "asc");
			$this->load->view('psb_daftar/cek_pendaftaran',$data);
		} else {
			$this->load->view('psb_daftar/cek_pendaftaran');
		}
		
		$this->load->view('themes/footloader');
	}

	
	public function konf_bayar(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$nisn=$this->input->post(nisn);
		$tgl_bayar=$this->input->post(tgl_bayar);
		$nominal=$this->input->post(nominal);
		$metode_pemb=$this->input->post(metode_pemb);
		$ket=$this->input->post(ket);
		if ($nisn != ""){
			$pemb=array('nisn' => $nisn, 'tgl_bayar' => $tgl_bayar, 'nominal' => $nominal, 'metode_pemb' => $metode_pemb, 'keterangan' => $ket, 'status' => 'Proses');
			$data['konf_pemb'] = $this->m_models->save_data($pemb, "konf_pembayaran");
			redirect('psb_daftar/konf_bayar');
			echo "<h5><b>Silahkan tunggu 1x24jam untuk konfirmasi pembayaran agar dapat login</b></h5>";
		} else {
			$this->load->view('psb_daftar/konf_bayar');
		}
		
		$this->load->view('themes/footloader');
	}

	function cekbayar(){
		$data['biaya_daftar'] = $this->m_models->getwhere("*", "biaya_daftar", "status", "on", "nominal", "asc");
		$this->load->view('psb_daftar/cekbayar',$data);
	}
	

	public function konfirmasi_bayar(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$this->load->view('psb_daftar/konfirmasi_bayar');
		$this->load->view('themes/footloader');
	}

	public function login_calon_psb(){
		$this->load->view('psb_daftar/psb_daftar');
		$this->load->view('themes/header');
		$this->load->view('psb_daftar/login_calon_psb');
		$this->load->view('themes/footloader');
	}


	function proses_login() {
		$this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_calon_psb');
		} else {
			$usr = $this->input->post('username');
			$psw = $this->input->post('password');
			$u = $usr;
			$p = $psw;
			$cek = $this->m_models->cekLoginCalonPSB($u, $p); 
			if ($cek->num_rows() > 0) {
			//login berhasil, buat session
				foreach ($cek->result() as $qad) {
					$sess_data['id_login'] = $qad->id_login;
					$sess_data['username'] = $qad->username;
					$sess_data['password'] = $qad->password;
					$sess_data['nisn'] = $qad->nisn;
					$this->session->set_userdata($sess_data);
				}
				$this->session->set_flashdata('success', 'Login Berhasil !');
				redirect(base_url('pendaftar/pendaftar'));
			} else {
				$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
				redirect(base_url('pendaftar/login_calon_psb'));
			}
		}
	}
	

	
	
}
?>

