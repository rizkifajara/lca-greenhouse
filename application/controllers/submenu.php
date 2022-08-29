<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu']= $this->submenu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu2'] = $this->db->get('user_sub_menu')->result_array();
        // $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
       

        if($this->form_validation->run()==false) {

            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser', $data);
            $this->load->view('admin/submenu',$data);
            $this->load->view('user/footeruser');
        } else{
            $data =[
                'title'=> $this->input->post('title'),
                'menu_id'=> $this->input->post('menu_id'),
                'url'=> $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');
            redirect('submenu');
        }
    }
    public function tambah_aksi(){
        $title= $this->input->post('title');
        $menu_id= $this->input->post('menu_id');
        $url= $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active= $this->input->post('is_active');

        $data = array(
            'title' => $title,
            'menu_id' => $menu_id,
            'url' =>$url,
            'icon' =>$icon,
            'is_active'=> $is_active,
        );
      
        $this->submenu_model->input_data($data, 'user_sub_menu');
        // $this->submenu_model->input_data($data2, 'user_menu');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');

        redirect ('C_skripsi/submenu');
    }

    public function hapus($id)
    {
        $where = array ('id'=>$id);
        $this->submenu_model->hapus_data($where, 'user_sub_menu');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Sub menu Deleted!</div>');
        redirect('C_skripsi/submenu');
    
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
        $this->load->view('edit',$data);
        $this->load->view('user/footeruser');

    }
    public function update(){
        $id = $this->input->post('id');
        $title= $this->input->post('title');
        $menu_id= $this->input->post('menu_id');
        $url= $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active= $this->input->post('is_active');

        $data1 = array(
            'title' => $title,
            'menu_id' => $menu_id,
            'url' =>$url,
            'icon' =>$icon,
            'is_active'=> $is_active,
        );
        
        $where = array ('id '=>$id);
        $this->Menu_model->update_data($where,$data1,'user_sub_menu');
        // $this->Menu_model->update_data($where,$data2,'user_menu');
        redirect('C_skripsi/submenu');
            }
        }
    