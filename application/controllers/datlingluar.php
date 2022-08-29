<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datlingluar extends CI_Controller{
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
    //     $this->load->model('datlingluarmod');
    // }

    public function index(){

        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $data['title'] = 'Data Lingkungan Luar Greenhouse';

        $user_id = $data['user']['id'];
        
        $data['siakad'] = $this->moddatlingluar->tampil_data($user_id)->result();
        // $data['proses'] = $this->lcimod->getProses()->result();
        

        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/datlingluar',$data);
        $this->load->view('user/footeruser');
    }
    public function tambah_aksi(){
        $user_id = $this->input->post('id_user');
        $waktu = $this->input->post('waktu');
        $suhudlm = $this->input->post('suhudlm');
        $suhuluar = $this->input->post('suhuluar');
        $rh = $this->input->post('rh');
        $kecepatanudara = $this->input->post('kecepatanudara');
        $fc = $this->input->post('fc');
        $lx = $this->input->post('lx');
        $ppfd = $this->input->post('ppfd');
        $wattm2 = $this->input->post('wattm2');

        $data = array (
            'userId' => $user_id,
            'waktu' => $waktu,
            'suhudlm' => $suhudlm,
            'suhuluar' =>$suhuluar,
            'rh' =>$rh,
            'kecepatanudara'=> $kecepatanudara,
            'fc' => $fc,
            'lx' => $lx,
            'ppfd' => $ppfd,
            'wattm2' => $wattm2,
        );

        $this->moddatlingluar->input_data($data, 'datlingluar');
        redirect ('datlingluar');
    }
        public function hapus($id)
        {
            $where = array ('id'=>$id);
            $this->moddatlingluar->hapus_data($where, 'datlingluar');
            redirect('datlingluar');
        
        }
        
        public function hapus2($id)
        {
            
            $id =$this->input->post("id");
            $this->moddatlingluar->hapus_data($id);
            redirect('datlingluar');
        }
        public function edit($id){
            $where = array('id' =>$id);
            $data['siakad'] = $this->moddatlingluar->edit_data($where,'datlingluar')->result();
            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser');
            $this->load->view('edit', $data);
            $this->load->view('user/footeruser');
        }
        public function update(){
        $id = $this->input->post('id');
        $waktu = $this->input->post('waktu');
        $suhudlm = $this->input->post('suhudlm');
        $suhuluar = $this->input->post('suhuluar');
        $rh = $this->input->post('rh');
        $kecepatanudara = $this->input->post('kecepatanudara');
        $fc = $this->input->post('fc');
        $lx = $this->input->post('lx');
        $ppfd = $this->input->post('ppfd');
        $wattm2 = $this->input->post('wattm2');

        $data = array(
        'waktu' => $waktu,
        'suhudlm' => $suhudlm,
        'suhuluar' =>$suhuluar,
        'rh' =>$rh,
        'kecepatanudara'=> $kecepatanudara,
        'fc' => $fc,
        'lx' => $lx,
        'ppfd' => $ppfd,
        'wattm2' => $wattm2,
    );
    $where = array ('id '=>$id);
    $this->moddatlingluar->update_data($where,$data,'datlingluar');
    redirect('datlingluar');
        }
        public function detail($id){
            $data['user'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])-> row_array();
            $data['title'] = 'Detail Data';
            $this->load->model('moddatlingluar');
            $detail = $this->moddatlingluar->detail_data($id);
            $data['detail'] = $detail;
            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser');
            $this->load->view('detail', $data);
            $this->load->view('user/footeruser');
        }

        }
        


    
 
