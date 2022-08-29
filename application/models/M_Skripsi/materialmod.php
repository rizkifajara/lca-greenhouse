<?php

class Materialmod extends CI_Model{

    public function tampil_data(){
		return $this->db->get('inventory');
	}
		public function input_data($data,$table){
		 $this->db->insert($table, $data);
		}
		public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function edit_data($where,$table){
            return $this->db->get_where($table,$where);

        }

        public function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        
        }
        public function detail_data($id = NULL){
            $query = $this->db->get_where('tesdatabase', array('id' =>$id))->row();
            return $query;
        }
 
	public function countPemanenan() {
        $query = $this->db->query("SELECT COUNT(proses) as 'jumlahPemanenan' FROM inventory WHERE proses='Pemanenan'");
        return $query;
    }

    public function countBudidaya() {
        $query = $this->db->query("SELECT COUNT(proses) as 'jumlahBudidaya' FROM inventory WHERE proses='Budidaya'");
        return $query;
    }

    public function countPenyemaian() {
        $query = $this->db->query("SELECT COUNT(proses) as 'jumlahPenyemaian' FROM inventory WHERE proses='Penyemaian'");
        return $query;
    }

    public function tampil_data_jenis_urut($tahun) {
        $query = $this->db->query("SELECT * FROM inventory WHERE tahun='$tahun' ORDER BY FIELD(proses, 'Penyemaian', 'Budidaya', 'Pemanenan')");
        // $this->db->from('inventory');
        // $this->db->where('tahun', $tahun);
        // $this->db->order_by("proses");
        // $query = $this->db->get(); 
        return $query;
    }

    public function countProses() {
        $query = $this->db->query("SELECT proses, COUNT(proses) AS jumlah FROM `inventory` GROUP BY proses");
        return $query;
    }

    public function tampil_data_jenis($tahun, $proses, $user_id) {
        $query = $this->db->query("SELECT * FROM inventory WHERE tahun='$tahun' AND proses='$proses' AND userId ='$user_id'");
        return $query;
    }

    public function daftar_user(){

        $this->db->select('id,name,email,lokasi,nama_gh');
        $this->db->from('user');
        $this->db->where('role_id',2);
        $query= $this->db->get();
        return $query;
    }


    //     $query= $this->db->get();
    //     return $query;

    // }
}
