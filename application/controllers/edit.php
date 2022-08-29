<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('dashboardmod');
    // }
    public function index(){
        // $data['siakad'] = $this->dashboardmod->join()->result();
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        // $data['siakad'] = $this->masdatmod->tampil_data()->result();

        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser');
        $this->load->view('edit',$data);
        $this->load->view('user/footeruser');

    }
}