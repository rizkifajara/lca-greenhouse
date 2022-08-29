<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datlingdalam extends CI_Controller{
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
    //     $this->load->model('datlingdalammod');
    // }

    public function index(){
       
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $data['title'] = 'Data Lingkungan Dalam Greenhouse';

        $user_id = $data['user']['id'];
        $data['siakad'] = $this->moddatlingdalam->tampil_data($user_id)->result();
        // $data['proses'] = $this->lcimod->getProses()->result();
        
        
        

        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/datlingdalam',$data);
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

        $this->moddatlingdalam->input_data($data, 'datlingdalam');
        redirect ('datlingdalam');
    }
        public function hapus($id)
        {
            $where = array ('id'=>$id);
            $this->moddatlingdalam->hapus_data($where, 'datlingdalam');
            redirect('datlingdalam');
        
        }
        
        public function hapus2($id)
        {
            
            $id =$this->input->post("id");
            $this->moddatlingdalam->hapus_data($id);
            redirect('datlingdalam');
        }
        public function edit($id){
            $where = array('id' =>$id);
            $data['siakad'] = $this->moddatlingdalam->edit_data($where,'datlingdalam')->result();
            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser',$data);
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
    $this->moddatlingdalam->update_data($where,$data,'datlingdalam');
    redirect('C_skripsi/datlingdalam');
        }
        public function detail($id){
            $data['user'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])-> row_array();
            $data['title'] = 'Detail Data';
            $this->load->model('moddatlingdalam');
            $detail = $this->moddatlingdalam->detail_data($id);
            $data['detail'] = $detail;
            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser');
            $this->load->view('detail', $data);
            $this->load->view('user/footeruser');
        }

        }
        


    
 
