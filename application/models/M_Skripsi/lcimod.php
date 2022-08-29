<?php

class Lcimod extends CI_Model{

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
        $query = $this->db->get_where('inventory', array('inventoryId' =>$id))->row();
        return $query;
    }

    public function getInterpretasi($tahun,$user_id) {
        $query = $this->db->query("SELECT proses AND userId, COUNT(*) AS 'jumlah' FROM inventory WHERE tahun = '$tahun' AND userId = '$user_id' GROUP BY proses");
        return $query;
    }
    
    public function getMaterial() {
        $query = $this->db->query('SELECT nama_material FROM lca_material');
        return $query;
    }

    // public function getDampak($dampak) {
    //     $query = $this->db->query("SELECT '$'")
    // }
	public function tampil_data_jenis($tahun) {
        $this->db->from('inventory');
        $this->db->where('tahun', $tahun);
        $this->db->order_by("proses");
        $query = $this->db->get(); 
        return $query;
    }

    public function getProses($user_id) {
        $query = $this->db->query("SELECT proses FROM lca_proses WHERE userId = '$user_id' or userId is NULL");
        return $query;
    }

    public function getInventory($tahun, $proses, $user_id) {
        
        $this->db->from('inventory');
        $this->db->where('proses', $proses);
        $this->db->where('tahun', $tahun);
        $this->db->where('userId', $user_id);
        
        $query = $this->db->get();
        return $query;
        
    }

    public function getTahun($user_id) {
        $query = $this->db->query("select distinct tahun from lca_tahun WHERE userId = '$user_id' or userId IS NULL order by tahun asc ");
        return $query;
    }
    
   
    public function getJenisMaterial(){
        $query = $this->db->query('select jenis_material from lca_jenismat');
        return $query;
    }
   
    public function proses_count($user_id){
        $query = $this->db->query("SELECT proses FROM lca_proses WHERE userId = '$user_id'");
        return $query;
       
    }

    public function getKalkulator($user_id) {
        $query = $this->db->query("SELECT * FROM kalkulator WHERE user_id = '$user_id'");
        return $query;
    }

    public function sumInventoryInterpretasi($user_id,$proses,$tahun) {
        $sql = "SELECT i.proses, i.nama_material, SUM(i.jumlah_material * z.GWP) AS jumlah_gwp, SUM(i.jumlah_material * z.AP) AS jumlah_ap, SUM(i.jumlah_material * z.EP) as jumlah_ep, SUM(i.jumlah_material * z.ODP) as jumlah_odp, SUM(i.jumlah_material *z.HCT) as jumlah_hct FROM inventory i LEFT JOIN lca_material y ON y.nama_material = i.nama_material LEFT JOIN lca_emisi z ON z.id_emisi = y.id_material WHERE i.proses = '$proses' AND i.tahun = '$tahun' AND i.userId = '$user_id' GROUP BY nama_material";
        $query = $this->db->query($sql);
        return $query;
    }
}