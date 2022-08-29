<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofile extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index(){

        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();

        $this->load->view('user/headeruser', $data);
        $this->load->view('user/sidebaruser');
        $this->load->view('user/myprofile', $data);
        $this->load->view('user/footeruser');
    }
}