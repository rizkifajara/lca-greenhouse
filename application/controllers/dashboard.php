<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index(){
        // $data['siakad'] = $this->dashboardmod->join()->result();
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $user_id = $data['user']['id'];
        $this->load->model('lcimod');
        $data['itung'] = $this->lcimod->proses_count($user_id)->result();

        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser');
        $this->load->view('user/dashboard',$data);
        $this->load->view('user/footeruser');
    }

   

    
}
