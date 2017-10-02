<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class c_santri extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('pagination');
		$this->load->model('m_models');
		$this->load->library('email');
	}

	public function beranda(){
		$this->load->view('prs/menu_csantri');
		$this->load->view('themes/header');
		$this->load->view('c_santri/beranda');
		$this->load->view('themes/footloader');
	}

	public function update_csantri(){
		$this->load->view('prs/menu_csantri');
		$this->load->view('themes/header');
		$nisn=$this->session->userdata['nisn'];	
		$no_daftar=$this->session->userdata['username'];
		$data['d_siswa'] = $this->m_models->getwhere("*", "calon_siswa", "no_daftar", $no_daftar, "nama_lengkap", "asc");

		$data['provinsi'] = $this->m_models->getTabelOrder("*", "provinsi", "nama", "asc");
		$data['kabupaten'] = $this->m_models->getTabelOrder("*", "kabupaten", "nama", "asc");
		$data['kecamatan'] = $this->m_models->getTabelOrder("*", "kecamatan", "nama", "asc");
		$data['kelurahan'] = $this->m_models->getTabelOrder("*", "kelurahan", "nama", "asc");
		$this->load->view('c_santri/update_csantri', $data);
		$this->load->view('themes/footloader');
	}
	
}
?>

