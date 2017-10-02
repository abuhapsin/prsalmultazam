<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendaftar extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('pagination');
		$this->load->model('m_models');
		$this->load->library('email');
	}

	public function pendaftar(){
		$this->load->view('pendaftar/menu_pendaftar');
		$this->load->view('themes/header');
		$this->load->view('themes/footloader');
	}

	public function beranda(){
		$this->load->view('pendaftar/menu_pendaftar');
		$this->load->view('themes/header');
		$this->load->view('themes/footloader');
	}

	public function update_pendaftar(){
		$this->load->view('pendaftar/menu_pendaftar');
		$this->load->view('themes/header');
		$nisn=$this->session->userdata['nisn'];	
		$no_daftar=$this->session->userdata['username'];
		$data['d_siswa'] = $this->m_models->getwhere("*", "calon_siswa", "no_daftar", $no_daftar, "nama_lengkap", "asc");

		$data['provinsi'] = $this->m_models->getTabelOrder("*", "provinsi", "nama", "asc");
		$data['kabupaten'] = $this->m_models->getTabelOrder("*", "kabupaten", "nama", "asc");
		$data['kecamatan'] = $this->m_models->getTabelOrder("*", "kecamatan", "nama", "asc");
		$data['kelurahan'] = $this->m_models->getTabelOrder("*", "kelurahan", "nama", "asc");
		$this->load->view('pendaftar/update_pendaftar',$data);
		$this->load->view('themes/footloader');
	}
	
	public function data_pendaftar(){
		$this->load->view('pendaftar/menu_pendaftar');
		$this->load->view('themes/header');
		$this->load->view('pendaftar/data_pendaftar');
		$this->load->view('themes/footloader');
	}
	
	public function simpan_update_pendaftar(){
		$this->load->view('pendaftar/menu_pendaftar');
		$this->load->view('themes/header');
		$ukuran_baju = strtoupper(addslashes($this->input->post('ukuran_baju')));
		$nisn = strtoupper(addslashes($this->input->post('nisn')));
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
		$agama = $this->input->post('agama');




		$gol_darah = $this->input->post('gol_darah');
		$tinggi_badan = $this->input->post('tinggi_badan');
		$berat_badan = $this->input->post('berat_badan');
		$bahasa = $this->input->post('bahasa');
		$riwayat_penyakit = $this->input->post('riwayat_penyakit');
		$anakke = $this->input->post('anakke');
		$sdr_kandung = $this->input->post('sdr_kandung');
		$sdr_tiri = $this->input->post('sdr_tiri');
		$sdr_angkat = $this->input->post('sdr_angkat');
		$tempat_lahir_ayah = $this->input->post('tempat_lahir_ayah');
		$anakke = $this->input->post('anakke');
		$anakke = $this->input->post('anakke');
		$anakke = $this->input->post('anakke');
		$anakke = $this->input->post('anakke');
		$anakke = $this->input->post('anakke');
		$anakke = $this->input->post('anakke');
		$anakke = $this->input->post('anakke');
		$anakke = $this->input->post('anakke');

		$this->load->view('pendaftar/data_pendaftar');
		$this->load->view('themes/footloader');
	}

	
		

}

?>