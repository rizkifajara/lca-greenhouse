<?php

class Lciamod extends CI_Model{

  
 
        public function joinProses($tahun, $proses, $user_id) {

            $this->db->select('i.nama_material, jumlah_material, GWP, AP, EP, ODP, HCT');
            $this->db->from('inventory i');
            $this->db->join('lca_material y', 'y.nama_material = i.nama_material','left');  
            // $this->db->join('lca_satuan x', 'x.satuan = i.satuan','left' );  
            $this->db->join('lca_emisi z', 'z.id_emisi = y.id_material','left' );  
            // $this->db->join('lca_emisi', 'z.id_emisi = x.id_satuan','left' );  
            $this->db->where('i.proses', $proses);  
            $this->db->where('i.tahun', $tahun);  
            $this->db->where('i.userId', $user_id);

            $query= $this->db->get();
            return $query;

        }

        public function sumProses($tahun, $proses, $user_id) {
            $sql = "SELECT i.proses, SUM(i.jumlah_material * z.GWP) AS jumlah_gwp, SUM(i.jumlah_material * z.AP) AS jumlah_ap, SUM(i.jumlah_material * z.EP) as jumlah_ep, SUM(i.jumlah_material * z.ODP) as jumlah_odp, SUM(i.jumlah_material *z.HCT) as jumlah_hct FROM inventory i LEFT JOIN lca_material y ON y.nama_material = i.nama_material LEFT JOIN lca_emisi z ON z.id_emisi = y.id_material WHERE i.proses = '$proses' AND i.tahun = '$tahun' AND i.userId = '$user_id'";
            $query = $this->db->query($sql);

            return $query;
        }
}