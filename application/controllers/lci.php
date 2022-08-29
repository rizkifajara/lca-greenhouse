<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lci extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index(){

        $tahun=$this->input->get('tahun');
        if ($tahun == NULL) {
			$tahun = '2020';
		}
        $proses_get=$this->input->get('proses');
        if ($proses_get == NULL) {
			$proses_get = 'Pembibitan';
		}

        $data['proses_get'] = $proses_get;
        $data['tahun'] = $tahun;
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $data['title'] = 'Life Cycle Inventory';

        $user_id = $data['user']['id'];
       
        $data['dtahun'] = $this->lcimod->getTahun($user_id)->result();
        $data['jenismat'] = $this->lcimod->getJenisMaterial()->result();
        

        $data['inventory'] = $this->lcimod->getInventory($tahun, $proses_get, $user_id)->result();
        $data['materials'] = $this->lcimod->getMaterial()->result();
        $data['proses'] = $this->lcimod->getProses($user_id)->result();
        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/lci',$data);
        $this->load->view('user/footeruser');
    }
    public function tambah_aksi(){
        $this->load->helper('string');
        $inventoryID = random_string('alnum', 10);
        $user_id = $this->input->post('id_user');
        $proses = $this->input->post('proses');
        $jenis_material = $this->input->post('jenis_material');
        $nama_material = $this->input->post('nama_material');
        $jumlah_material = $this->input->post('jumlah_material');
        // $satuan = $this->input->post('satuan');
        $tipedata = $this->input->post('tipedata');
        $tahun = $this->input->post('tahun');

        $data = array (
            'inventoryId' => $inventoryID,
            'userId' => $user_id,
            'proses' => $proses,
            'jenis_material' =>$jenis_material,
            'tahun' =>$tahun,
            'nama_material' =>$nama_material,
            'jumlah_material' =>$jumlah_material,
            // 'satuan' => $satuan,
            'tipedata' => $tipedata,
        );

        $this->lcimod->input_data($data, 'inventory');
        redirect ('lci');
    }
        public function hapus($id)
        {
            $where = array ('inventoryId'=>$id);
            $this->lcimod->hapus_data($where, 'inventory');
            redirect('lci');
        
        }
        
       
        public function edit($id){
            $where = array('inventoryId' =>$id);
            $data['siakad'] = $this->lcimod->edit_data($where,'inventory')->result();
          
        }
        public function update(){
            $inventoryId = $this->input->post('inventoryId');
            $proses = $this->input->post('proses');
            $jenis_material = $this->input->post('jenis_material');
            $tahun = $this->input->post('tahun');
            $nama_material = $this->input->post('nama_material');
            $jumlah_material = $this->input->post('jumlah_material');
            // $satuan = $this->input->post('satuan');;
            $tipedata = $this->input->post('tipedata');

            $data = array(
                'inventoryId' => $inventoryId,
                'proses' => $proses,
                'jenis_material' =>$jenis_material,
                'tahun' =>$tahun,
                'nama_material' =>$nama_material,
                'jumlah_material' =>$jumlah_material,
                // 'satuan' => $satuan,
                'tipedata' => $tipedata,
            );
            $where = array ('inventoryId '=>$inventoryId);
            $this->lcimod->update_data($where,$data,'inventory');
            redirect('lci');
        }
        public function detail($id){
            $data['user'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])-> row_array();
            $data['title'] = 'Detail Data';
            $this->load->model('lcimod');
            $detail = $this->lcimod->detail_data($id);
            $data['detail'] = $detail;
            
            $this->load->view('user/headeruser',$data);  
            $this->load->view('user/sidebaruser');
            $this->load->view('detail',$detail,$data);
            $this->load->view('user/footeruser');
        }

        }
        


    
 
