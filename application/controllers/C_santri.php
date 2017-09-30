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

	public function beranda(){
		$this->load->view('prs/menu_csantri');
		$this->load->view('themes/header');
		$this->load->view('c_santri/update_csantri');
		$this->load->view('themes/footloader');
	}
	
}
?>

