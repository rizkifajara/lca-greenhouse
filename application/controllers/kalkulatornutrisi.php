<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalkulatornutrisi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index(){
        // $data['siakad'] = $this->dashboardmod->join()->result();
        $data['title'] = 'Kalkulator Nutrisi';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
        $user_id = $data['user']['id'];
        $data['id_user'] = $user_id;
        $this->load->model('lcimod');
        $data['itung'] = $this->lcimod->proses_count($user_id)->result();
        $data['kalkulator'] = $this->lcimod->getKalkulator($user_id)->result();

        $this->load->view('user/headeruser',$data);  
        $this->load->view('user/sidebaruser');
        $this->load->view('user/kalkulatornutrisi',$data);
        $this->load->view('user/footeruser');
    }

    public function save(){
        $this->load->helper('string');
        $kalkulatorId = random_string('alnum', 10);
        $user_id = $this->input->post('id_user');
        $nutrisi = $this->input->post('hasil_form');
		$ppm = $this->input->post('ppm');
		$air = $this->input->post('air');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $date = $now->format('Y-m-d H:i:s');

        $data = array (
            'id' => $kalkulatorId,
			'ppm' => $ppm,
			'air' => $air,
            'user_id' => $user_id,
            'nutrisi' => $nutrisi,
            'tanggal' => $date
        );

        $this->lcimod->input_data($data, 'kalkulator');
        redirect ('kalkulatornutrisi');
    }

    
}
