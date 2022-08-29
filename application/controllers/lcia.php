<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lcia extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
  
    public function index(){

        $tahun=$this->input->get('tahun');
        $proses=$this->input->get('proses');
        if ($tahun == NULL) {
			$tahun = '2020';
		}
        if ($proses == NULL) {
			$proses = 'Penyemaian';
		} 
        $data['title'] = 'Life Cycle Impact Assessment';
        
    
        $data['tahun'] = $tahun;
        
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        // $data['siakad'] = $this->lciamod->join()->result();
        $user_id = $data['user']['id'];
        $data['dtahun'] = $this->lcimod->getTahun($user_id)->result();
        $data['proses'] = $this->lcimod->getProses($user_id)->result();

        
        $data['siakad'] = $this->lciamod->joinProses($tahun, $proses, $user_id)->result();
        $data['sumTable'] = $this->lciamod->sumProses($tahun, $proses, $user_id)->result();
        
        // foreach ($data['siakad'] as $row) {
        //     echo $row->nama_material;
        // }

        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/lcia',$data);
        $this->load->view('user/footeruser');
    }
    
        


    
 }
