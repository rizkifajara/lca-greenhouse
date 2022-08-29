<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends CI_Controller{
   

    public function index(){

        $data['title'] = 'tester';
        
        
        $data['testing'] = $this->testermod->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/tester',$data);
        $this->load->view('user/footeruser');
    


    }
}