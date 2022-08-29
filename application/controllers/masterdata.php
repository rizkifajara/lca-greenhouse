<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
   

    public function index(){

        $data['title'] = 'Master Data';
        $data['siakad'] = $this->masdatmod->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        
        $this->load->view('user/headeruser' ,$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/masterdata',$data);
        $this->load->view('user/footeruser');
    }

    public function Tahun(){

        $data['title'] = 'Master Tahun';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $user_id = $data['user']['id'];
        
        $data['tampil_tahun'] = $this->masdatmod->tampil_tahun($user_id)->result();
        
        $this->load->view('user/headeruser' ,$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/tahun',$data);
        $this->load->view('user/footeruser');

    }

    public function Proses(){

        $data['title'] = 'Master Tahun';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $user_id = $data['user']['id'];
        
        $data['tampil_proses'] = $this->masdatmod->tampil_proses($user_id)->result();
        
        $this->load->view('user/headeruser' ,$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/proses',$data);
        $this->load->view('user/footeruser');

    }
    
    public function tambah_aksi(){
        $nama_material= $this->input->post('nama_material');
        // $satuan = $this->input->post('satuan');
        $GWP = $this->input->post('GWP');
        $AP = $this->input->post('AP');
        $EP = $this->input->post('EP');
        $ODP = $this->input->post('ODP');
        $HCT = $this->input->post('HCT');
        $sumberdata = $this->input->post('sumberdata');
        // $AD = $this->input->post('AD');
        // $BD = $this->input->post('BD');
        // $Carcinogenik = $this->input->post('Carcinogenik');
        // $Toxicity = $this->input->post('Toxicity');
        // $WF = $this->input->post('WF');
        // $LUC = $this->input->post('LUC');

        // echo $GWP;

        $data1 = array (
            'nama_material' => $nama_material,
            // 'satuan' => $satuan,
            'GWP' => $GWP,
            'AP' => $AP,
            'EP' =>$EP,
            'ODP' =>$ODP,
            'HCT'=> $HCT,
            'sumberdata' => $sumberdata
            // 'AD' => $AD,
            // 'BD' => $BD,
            // 'Carcinogenik' => $Carcinogenik,
            // 'Toxicity' => $Toxicity,
            // 'WF' => $WF,
            // 'LUC' => $LUC,
        );
        $data2 = array(
            'nama_material' =>$nama_material,
        );
        // $data3 = array(
        //     'satuan' => $satuan,
        // );

        $this->masdatmod->input_data($data1, 'lca_emisi');
        $this->masdatmod->input_data($data2, 'lca_material');
        // $this->masdatmod->input_data($data3, 'lca_satuan');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data has been successfully added!</div>');
        redirect('masterdata');

     
    }

    public function tambahTahun() {
        
        $tahun = $this->input->post('tahun');
        $user_id = $this->input->post('id_user');
        $data = array (
            'tahun' => $tahun,
            'userId' =>$user_id,
        );

        $this->masdatmod->input_data($data, 'lca_tahun');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tahun has been successfully added!</div>');
        redirect('masterdata/Tahun');
    }

    public function hapusTahun($id) {
        $where = array ('id_tahun'=>$id);
        $this->masdatmod->hapus_tahun($where, 'lca_tahun');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Tahun Deleted!</div>');
        redirect('masterdata/tahun');
    }
    public function hapusProses($id) {
        $where1 = array ('id_proses'=>$id);
        $where2 = array ('id'=>$id);
        $this->masdatmod->hapus_proses($where1, 'lca_proses');
        $this->masdatmod->hapus_proses2($where2, 'user_sub_sub_menu');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Proses Deleted!</div>');
        redirect('masterdata/proses');
    }

    public function tambahProses() {
        $title = $this->input->post('title');
        $urutan = $this->input->post('urutan');
        $user_id = $this->input->post('id_user');
        // $group_menu= $this->input->post('1','3');
        $data1 = array (
            'title' => $title,
            'userId' =>$user_id,
            // 'sumberdata' => NULL,
            'urutan' => $urutan,
            'group_menu' => 1,
            'url' => "lcia?proses=$title",
            'date_created' => time(),
            
        );
        $data2 =array (
            'title' => $title,
            'urutan' => $urutan,
            'userId' =>$user_id,
            'group_menu' =>3,
            'url' => "lci?proses=$title",
            'date_created' => time(),

        );

        $data3 = array (
            'proses' => $title,
            'userId' =>$user_id,
        );

        $this->masdatmod->input_data($data1, 'user_sub_sub_menu');
        $this->masdatmod->input_data($data2, 'user_sub_sub_menu');
        $this->masdatmod->input_data($data3, 'lca_proses');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Proses has been successfully added!</div>');
        redirect('masterdata/proses');
    }
    

       

        }
        


    
 
