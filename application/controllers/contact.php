<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index(){

        $data['title'] = 'Contact';

        // $this->load->view('v_skripsi/header');
        // $this->load->view('v_skripsi/sidebar');
        $this->load->view('user/contact',$data);
        // $this->load->view('v_skripsi/footer');
    }
}