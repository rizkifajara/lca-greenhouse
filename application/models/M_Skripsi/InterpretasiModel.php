<?php

class InterpretasiModel extends CI_Model {

    public function tampil_data() {
        $query = $this->db->query("SELECT proses, COUNT(*) FROM inventory GROUP BY proses");
        return $query;
    }

    public function getProses() {
        $query = $this->db->query("SELECT * FROM lca_proses");
        return $query;
    }

    public function sumInventoryInterpretasi($user_id,$proses,$tahun) {
        $sql = "SELECT i.proses, i.nama_material, SUM(i.jumlah_material * z.GWP) AS jumlah_gwp, SUM(i.jumlah_material * z.AP) AS jumlah_ap, SUM(i.jumlah_material * z.EP) as jumlah_ep, SUM(i.jumlah_material * z.ODP) as jumlah_odp, SUM(i.jumlah_material *z.HCT) as jumlah_hct FROM inventory i LEFT JOIN lca_material y ON y.nama_material = i.nama_material LEFT JOIN lca_emisi z ON z.id_emisi = y.id_material WHERE i.proses = '$proses' AND i.tahun = '$tahun' AND i.userId = '$user_id' GROUP BY nama_material";
        $query = $this->db->query($sql);
    }
}

?>
