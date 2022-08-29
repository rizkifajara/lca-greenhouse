<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Block extends CI_Controller{

    public function index(){
        $data['title'] = 'Access Denied';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser');  
        $this->load->view('block',$data);  
        $this->load->view('user/footeruser');  
    }
}