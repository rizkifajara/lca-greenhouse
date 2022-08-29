<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    //     }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        
        $this->load->view('user/headeruser',$data);
        
        $this->load->view('user/sidebaruser');
        $this->load->view('user/dashboard',$data);
        $this->load->view('user/footeruser');
        
    } 
 }

