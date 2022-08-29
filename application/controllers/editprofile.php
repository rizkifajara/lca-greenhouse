<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editprofile extends CI_Controller{



    public function index() {

        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user',['email'=> 
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name','Full Name','required|trim');
        $this->form_validation->set_rules('lokasi','Lokasi','required|trim');
        $this->form_validation->set_rules('nama_gh','Nama Greenhouse','required|trim');

        if($this->form_validation->run() == false) {
        $this->load->view('user/headeruser',$data);
        $this->load->view('user/sidebaruser',$data);
        $this->load->view('user/myprofile',$data);
        $this->load->view('user/footeruser');
        } else {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $lokasi = $this->input->post('lokasi');
        $nama_gh = $this->input->post('nama_gh');

        //cek apakah ada gambar

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/dist/img/';
            
            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')){
                $new_image = $this->upload->data('file_name');
                $this->db->set('image',$new_image);

            }else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name',$name);
        $this->db->set('lokasi',$lokasi);
        $this->db->set('nama_gh',$nama_gh);
        $this->db->where('email',$email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your Profile
        has been updated!</div>');
        // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        redirect('myprofile');
    }
}
}