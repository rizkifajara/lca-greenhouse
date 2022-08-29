<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    public function index(){

        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        if($this->form_validation->run() == false){
        $data['title']= 'LCA Master Login';
        $this->load->view('auth/header2',$data);  
        $this->load->view('auth');  
        $this->load->view('auth/footer2');  
        } else{
            $this->_login();
        }
       
    }

    private function _login()
    {
       $email = $this->input->post('email');
       $password = $this->input->post('password');

       $user = $this->db->get_where('user',['email' => $email])->row_array();
        
       //jika usernya ada
       if($user) {
           // jika usernya aktif
           if($user['is_active']==1){
               //cek password
               if(password_verify($password, $user['password'])){
                $data= [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if($user['role_id']== 1){
                    redirect('admin/role');
                } else {
                redirect('user');}
               }else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
                     
               }

        
           } else{
               $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email has not been activated!</div>');
                redirect('auth');
            }

       } else {
           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
           redirect('auth');
       }
    }

    public function registration(){
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique'=> 'This Email is already Registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        
        if ($this->form_validation->run() == false){
        $data['title']= 'LCA Master Registration';
        $this->load->view('auth/header2',$data);  
        $this->load->view('register');  
        $this->load->view('auth/footer2'); 
        } else{
            $data = [

                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'avatar3.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), 
               
                'role_id' => 2,
                'is_active' =>1,
                'lokasi' => $this->input->post('lokasi'),
                'nama_gh' => $this->input->post('nama_gh'),
                'date_created'=>time()
            ];
            // $data2 = [
            //     'group_menu' => 1,
            //     'title' => 'Penyemaian',
            //     'url' => "lcia?proses=penyemaian",
            //     'urutan' => 1,
            //     'userId' => 


            // ];
            // $data3 =[

            // ];
            // $data4 =[

            // ];
            // $data5 =[

            // ];

            $this->db->insert('user', $data);
        // $this->db->insert('user_sub_sub_menu', $data2);
            // $this->db->insert('user', $data);
            // $this->db->insert('user', $data);
            $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">
            Your Account Has Been Created! Please Login </div>');
          
            redirect ('auth');
 
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" 
        role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}