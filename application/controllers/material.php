<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('lcimod');
    // }
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
        $data['tahun'] = $tahun;
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $data['title'] = 'Life Cycle Inventory';

        $user_id = $data['user']['id'];
        $data['dtahun'] = $this->lcimod->getTahun($user_id)->result();
        
        $data['siakad'] = $this->materialmod->tampil_data_jenis_urut($tahun)->result();
        
        $data['countProses'] = $this->materialmod->countProses()->result();
        $data['countProsesFix'] = [];
        $data['dataArrFix'] = [];
        foreach ($data['countProses'] as $row) {
            $tempArr = array();
            $dataArr = array();
            if ($row->proses != 'Pembibitan') {
                continue;
            }
            $dataArr = $this->materialmod->tampil_data_jenis($tahun, $row->proses,$user_id)->result();
            array_push($tempArr, $row->proses, $row->jumlah);
            
            array_push($data['countProsesFix'], $tempArr);
            array_push($data['dataArrFix'], $dataArr);
        }

        foreach ($data['countProses'] as $row) {
            $tempArr = array();
            $dataArr = array();
            if ($row->proses != 'Pemeliharaan') {
                continue;
            }
            $dataArr = $this->materialmod->tampil_data_jenis($tahun, $row->proses,$user_id)->result();
            array_push($tempArr, $row->proses, $row->jumlah);
            
            array_push($data['countProsesFix'], $tempArr);
            array_push($data['dataArrFix'], $dataArr);
        }

        foreach ($data['countProses'] as $row) {
            $tempArr = array();
            $dataArr = array();
            if ($row->proses != 'Pemanenan') {
                continue;
            }
            $dataArr = $this->materialmod->tampil_data_jenis($tahun, $row->proses,$user_id)->result();
            array_push($tempArr, $row->proses, $row->jumlah);
            
            array_push($data['countProsesFix'], $tempArr);
            array_push($data['dataArrFix'], $dataArr);
        }

        foreach ($data['countProses'] as $row) {
            $tempArr = array();
            $dataArr = array();
            if ($row->proses == 'Pembibitan' || $row->proses == 'Pemeliharaan' || $row->proses == 'Pemanenan') {
                continue;
            }
            $dataArr = $this->materialmod->tampil_data_jenis($tahun, $row->proses,$user_id)->result();
            array_push($tempArr, $row->proses, $row->jumlah);
            
            array_push($data['countProsesFix'], $tempArr);
            array_push($data['dataArrFix'], $dataArr);
        }
       

        $data['proses'] = $this->lcimod->getProses($user_id)->result();
        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/material',$data);
        $this->load->view('user/footeruser');
    }
    // public function tambah_aksi(){
    //     $this->load->helper('string');
    //     $inventoryID = random_string('alnum', 10);
    //     $proses = $this->input->post('proses');
    //     $jenis_material = $this->input->post('jenis_material');
    //     $tahun = $this->input->post('tahun');
    //     $nama_material = $this->input->post('nama_material');
    //     $jumlah_material = $this->input->post('jumlah_material');
    //     $satuan = $this->input->post('satuan');;
    //     $tipedata = $this->input->post('tipedata');

    //     $data = array (
    //         'inventoryId' => $inventoryID,
    //         'proses' => $proses,
    //         'jenis_material' =>$jenis_material,
    //         'nama_material' =>$nama_material,
    //         'jumlah_material' =>$jumlah_material,
    //         'satuan' => $satuan,
    //         'tipedata' => $tipedata,
    //     );

    //     $this->lcimod->input_data($data, 'inventory');
    //     redirect ('C_skripsi/material');
    // }
    //     public function hapus($id)
    //     {
    //         $where = array ('id'=>$id);
    //         $this->materialmod->hapus_data($where, 'tesdatabase');
    //         redirect('C_skripsi/material');
        
    //     }
    //     public function edit($id){
    //         $where = array('id' =>$id);
    //         $data['siakad'] = $this->materialmod->edit_data($where,'tesdatabase')->result();
    //         $this->load->view('v_skripsi/header');
    //         $this->load->view('v_skripsi/sidebar');
    //         $this->load->view('edit', $data);
    //         $this->load->view('v_skripsi/footer');
    //     }
    //     public function update(){
    //     $id = $this->input->post('id');
    //     $waktu = $this->input->post('waktu');
    //     $namamaterial = $this->input->post('namamaterial');
    //     $jumlah = $this->input->post('jumlahmaterial');
    //     $satuan = $this->input->post('satuan');
    //     $sumberdata = $this->input->post('sumberdata');
    //     $jenisdata = $this->input->post('jenisdata');
    //     $keterangan = $this->input->post('keterangan');

    //     $data = array(
    //     'waktu' => $waktu,
    //     'namamaterial' => $namamaterial,
    //     'jumlahmaterial' =>$jumlah,
    //     'satuan' =>$satuan,
    //     'sumberdata'=> $sumberdata,
    //     'jenisdata' => $jenisdata,
    //     'keterangan' => $keterangan,
    // );
    // $where = array ('id '=>$id);
    // $this->materialmod->update_data($where,$data,'tesdatabase');
    // redirect('C_skripsi/material');
    //     }
    //     public function detail($id){
    //         $this->load->model('materialmod');
    //         $detail = $this->materialmod->detail_data($id);
    //         $data['detail'] = $detail;
    //         $this->load->view('v_skripsi/header');
    //         $this->load->view('v_skripsi/sidebar');
    //         $this->load->view('detail', $data);
    //         $this->load->view('v_skripsi/footer');
    //     }

        }
        


    
 
