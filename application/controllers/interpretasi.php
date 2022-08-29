<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class interpretasi extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
	// public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('interpretasi');
    // }

	public function index()
	{
		$tahun=$this->input->get('tahun');
		$dampak=$this->input->get('dampak');
		if ($tahun == NULL) {
			$tahun = '2020';
		}
		if ($dampak == NULL) {
			$dampak = 'GWP';
		}
		$data['title'] = 'Interpretasi';
		$data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])-> row_array();
		$user_id = $data['user']['id'];
		$data['interpret'] = $this->lcimod->getInterpretasi($tahun,$user_id)->result();
		$data['proses'] = $this->lcimod->getProses($user_id)->result();
		$data['dtahun'] = $this->lcimod->getTahun($user_id)->result();
		
		$proses = $this->lcimod->getProses($user_id)->result();

		// $data['dataArr'] = [];
		$data['arrFix'] = [];

		$dataArr = [];

		foreach($proses as $row) {
			$tempProses = $row->proses;
			
			$tempArr = $this->lcimod->sumInventoryInterpretasi($user_id,$tempProses,$tahun)->result();
			array_push($dataArr, $tempArr);
		}

		$arrJumlah = [];
		$arrProses = [];
		$arrMaterial = [];

		foreach ($dataArr as $row) {
			foreach ($row as $value) {
				if ($dampak == 'GWP') {
					array_push($arrJumlah, $value->jumlah_gwp);
				} elseif ($dampak == 'AP') {
					array_push($arrJumlah, $value->jumlah_ap);
				} elseif ($dampak == 'EP') {
					array_push($arrJumlah, $value->jumlah_ep);
				} elseif ($dampak == 'ODP') {
					array_push($arrJumlah, $value->jumlah_odp);
				} elseif ($dampak == 'HCT') {
					array_push($arrJumlah, $value->jumlah_hct);
				}
				array_push($arrProses, $value->proses);
				array_push($arrMaterial, $value->nama_material);
			}
		}

		// var_dump($arrJumlah);
		// var_dump($arrProses);
		// var_dump($arrMaterial);

		$data['arrJumlah'] = $arrJumlah;
		$data['arrProses'] = $arrProses;
		$data['arrMaterial'] = $arrMaterial;

		$data['dataArr'] = [];
		$data['arrFix'] = [];

		// var_dump($dataArr);
		// echo $dataArr[1][0]->proses;
		foreach($data['proses'] as $key => $value) {
			$tempArr = $this->lciamod->sumProses($tahun, $value->proses,$user_id)->result();
			// print_r($tempArr);
			// var_dump($tempArr);
			// array_push($data['dataArr'], $tempArr);
			foreach($tempArr as $k => $v) {
				$tmpArr = [];
				if ($dampak == 'GWP') {
					array_push($tmpArr, $v->proses, $v->jumlah_gwp);
					array_push($data['arrFix'], $tmpArr);
				} elseif ($dampak == 'AP') {
					array_push($tmpArr, $v->proses, $v->jumlah_ap);
					array_push($data['arrFix'], $tmpArr);
				} elseif ($dampak == 'EP') {
					array_push($tmpArr, $v->proses, $v->jumlah_ep);
					array_push($data['arrFix'], $tmpArr);
				} elseif ($dampak == 'ODP') {
					array_push($tmpArr, $v->proses, $v->jumlah_odp);
					array_push($data['arrFix'], $tmpArr);
				} elseif ($dampak == 'HCT') {
					array_push($tmpArr, $v->proses, $v->jumlah_hct);
					array_push($data['arrFix'], $tmpArr);
				}
			}
			
		}
		$data['arrJumlahProses'] = [];
		$data['jumlahProses'] = array_count_values($data['arrProses']);
		// foreach ($jumlahProses as $key => $value) {
		// 	array_push($data['arrJumlahProses'], $value);
		// }


		// $data['arrFix'] = $dataArr;


		// foreach ($data['arrProses'] as $row) {
		// 	echo $row . '\n';
		// }

		// var_dump($arrMaterial);
		// var_dump($arrProses);
		// var_dump($arrJumlah);
		// var_dump($data['jumlahProses']);
		
		
		$this->load->view('user/headeruser' ,$data);
		$this->load->view('user/sidebaruser', $data);
		$this->load->view('user/interpretasi', $data);
		$this->load->view('user/footeruser');
    }
}