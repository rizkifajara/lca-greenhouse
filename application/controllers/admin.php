<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();  
        }
    


    // public function index()
    // {
    //     $data['title'] = 'Menu';
    //     $data['user'] = $this->db->get_where('user', ['email' => 
    //     $this->session->userdata('email')])-> row_array();
    //     $data['menu'] = $this->db->get('user_menu')->result_array();
        
    //     $this->load->view('user/headeruser',$data);
    //     $this->load->view('user/sidebaradmin');
    //     $this->load->view('admin/menu',$data);
    //     $this->load->view('user/footeruser');
    // }

    public function menu()
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
            redirect('admin/menu');

        }

    }
    public function tambah_menu(){
        $menu= $this->input->post('menu');
        

        $data = array(
            'menu' => $menu,
            
        );
      
        $this->Menu_model->input_data($data, 'user_menu');
        // $this->submenu_model->input_data($data2, 'user_menu');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added!</div>');

        redirect ('admin/menu');
    }

    public function hapus_menu($id)
    {
        $where = array ('id'=>$id);
        $this->Menu_model->hapus_data($where, 'user_menu');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Menu Deleted!</div>');
        redirect('admin/menu');
    
    }
    public function edit_menu($id){
        $where = array('id' =>$id);
        // $data['subMenu']= $this->submenu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // $data['submenu2'] = $this->db->get('user_sub_menu')->result_array();
        $data['siakad'] = $this->Menu_model->edit_data($where,'user_menu')->result();
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $this->load->view('user/headeruser',$data);
        $this->load->view('user/sidebaruser', $data);
        $this->load->view('editMenu',$data);
        $this->load->view('user/footeruser');

    }
    public function update_menu(){
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');
     

        $data1 = array(
            'menu' => $menu,
            
        );
        
        $where = array ('id '=>$id);
        $this->Menu_model->update_data($where,$data1,'user_menu');
        // $this->Menu_model->update_data($where,$data2,'user_menu');
        redirect('admin/menu');
            }

        public function submenu()
        {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $this->load->model('submenu_model');

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
                // 'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');
            redirect('submenu');
        }
    }
    public function tambah_submenu(){
        $title= $this->input->post('title');
        $menu_id= $this->input->post('menu_id');
        $url= $this->input->post('url');
        $icon = $this->input->post('icon');
        $urutan = $this->input->post('urutan');
        // $is_active= $this->input->post('is_active');

        $data = array(
            'title' => $title,
            'menu_id' => $menu_id,
            'url' =>$url,
            'icon' =>$icon,
            'urutan' => $urutan,
            // 'is_active'=> $is_active,
        );
      
        $this->submenu_model->input_data($data, 'user_sub_menu');
        // $this->submenu_model->input_data($data2, 'user_menu');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');

        redirect ('admin/submenu');
    }

    public function hapus_submenu($id)
    {
        $where = array ('id'=>$id);
        $this->submenu_model->hapus_data($where, 'user_sub_menu');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Sub menu Deleted!</div>');
        redirect('admin/submenu');
    
    }
    public function edit_submenu($id){
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
    public function update_submenu(){
        $id = $this->input->post('id');
        $title= $this->input->post('title');
        $menu_id= $this->input->post('menu_id');
        $url= $this->input->post('url');
        $icon = $this->input->post('icon');
        $urutan = $this->input->post('urutan');
        // $is_active= $this->input->post('is_active');

        $data1 = array(
            'title' => $title,
            'menu_id' => $menu_id,
            'url' =>$url,
            'icon' =>$icon,
            'urutan' =>$urutan,
            // 'is_active'=> $is_active,
        );
        
        $where = array ('id '=>$id);
        $this->Menu_model->update_data($where,$data1,'user_sub_menu');
        // $this->Menu_model->update_data($where,$data2,'user_menu');
        redirect('admin/submenu');
            }

        public function role()
        {
            $data['title'] = 'Role';
            $data['user'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])-> row_array();

            $data['role'] = $this->db->get('user_role')->result_array();

            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser',$data);
            $this->load->view('admin/role',$data);
            $this->load->view('user/footeruser');


        }

        public function list_akses(){

            
            // $data['title'] = 'Role';
         
            $data['title'] = 'List User';
            $data['user'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])-> row_array();
            
            $data['daftar'] = $this->materialmod->daftar_user()->result();

            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser',$data);
            $this->load->view('admin/list_akses',$data);
            $this->load->view('user/footeruser');
        }

        public function roleAccess($role_id)
        {
            $data['title'] = 'Role Access';
            $data['user'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])-> row_array();

            $data['role'] = $this->db->get_where('user_role',['id'=>$role_id])->row_array();
            $this->db->where ('id!=',1);
            $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->load->view('user/headeruser',$data);
            $this->load->view('user/sidebaruser',$data);
            $this->load->view('admin/roleaccess',$data);
            $this->load->view('user/footeruser');


        }

        public function changeaccess() {

            $menu_id = $this->input->post('menuId');
            $role_id = $this->input->post('roleId');

            $data = [
                'role_id' =>$role_id,
                'menu_id' => $menu_id
            ];

            $result = $this->db->get_where('user_access_menu', $data);

            if($result->num_rows()<1) {
                $this->db->insert('user_access_menu',$data);
            } else {
                $this->db->delete('user_access_menu', $data);
                }

                $this->session->set_flashdata('message','<div class="alert alert-success"
                role="alert"> Access Changed!</div>');
            }
        }
        
