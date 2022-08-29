<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function index()
	{
		$this->load->view('v_skripsi/header');
		$this->load->view('v_skripsi/sidebar');
		$this->load->view('v_skripsi/index');
		$this->load->view('v_skripsi/footer');
    }
}