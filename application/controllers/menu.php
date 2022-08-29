<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        }
    
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('user/headeruser',$data);
        $this->load->view('user/sidebaruser', $data);
        $this->load->view('admin/menu',$data);
        $this->load->view('user/footeruser');
        } else{
            $this->db->insert('user_menu', ['menu'=>$this->input->post('menu')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu');

        }

    }
    public function tambah_aksi(){
        $menu= $this->input->post('menu');
        

        $data = array(
            'menu' => $menu,
            
        );
      
        $this->submenu_model->input_data($data, 'user_menu');
        // $this->submenu_model->input_data($data2, 'user_menu');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added!</div>');

        redirect ('C_skripsi/menu');
    }

    public function hapus($id)
    {
        $where = array ('id'=>$id);
        $this->submenu_model->hapus_data($where, 'user_menu');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Menu Deleted!</div>');
        redirect('C_skripsi/menu');
    
    }
    public function edit($id){
        $where = array('id' =>$id);
        $data['subMenu']= $this->submenu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu2'] = $this->db->get('user_sub_menu')->result_array();
        $data['siakad'] = $this->submenu_model->edit_data($where,'user_sub_menu')->result();
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $this->load->view('user/headeruser',$data);
        $this->load->view('user/sidebaruser', $data);
        $this->load->view('editMenu',$data);
        $this->load->view('user/footeruser');

    }
    public function update(){
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');
     

        $data1 = array(
            'menu' => $menu,
            
        );
        
        $where = array ('id '=>$id);
        $this->Menu_model->update_data($where,$data1,'user_menu');
        // $this->Menu_model->update_data($where,$data2,'user_menu');
        redirect('C_skripsi/menu');
            }
        
 
  
}