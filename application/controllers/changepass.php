<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Changepass extends CI_Controller{

        public function index(){
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email'=>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
    
    

    if ($this->form_validation->run() == false) {

        $this->load->view('user/headeruser',$data);
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/myprofile',$data);
        $this->load->view('user/footeruser');
        }else {
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        if (!password_verify($current_password, $data['user']['password'])) {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Wrong current Password!</div>');
            redirect('myprofile');
             } else {
            if ($current_password == $new_password) {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                New Password cannot be the same as current password!</div>');
                redirect('myprofile');
                } else {

                //password sudah ok
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Password Changed</div>');
                redirect('myprofile');
                }

            }
        }
        }
    }





        
