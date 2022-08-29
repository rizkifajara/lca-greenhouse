<?php

class Masdatmod extends CI_Model{

    public function tampil_data(){
		return $this->db->get('lca_emisi');


	}
        public function join(){
            // $this->db->select('*');
            // $this->db->from('lca_inputoutput x' );
            // $this->db->join('lca_material y', 'y.id_material = x.id_material','left');  
            // $this->db->join('lca_emisi z', 'z.id_emisi = x.id_emisi','left' );  
        
            $query= $this->db->query("SELECT * FROM lca_emisi LEFT JOIN lca_material y ON y.id_material = id_emisi");
            return $query;
            
        }
		public function input_data($data,$table){
		 $this->db->insert($table, $data);
		}
		
        public function tampil_tahun($user_id){

            $this->db->select('id_tahun,userId,tahun');
            $this->db->from('lca_tahun');
            $this->db->where('userId',$user_id);
            $query= $this->db->get();
            return $query;


        }
        public function tampil_proses($user_id){

            $this->db->select('id_proses,userId,proses');
            $this->db->from('lca_proses');
            $this->db->where('userId',$user_id);
            $query= $this->db->get();
            return $query;


        }

        public function hapus_tahun($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function hapus_proses($where1, $table){
            $this->db->where($where1);
            $this->db->delete($table);
        }
        public function hapus_proses2($where2, $table){
            $this->db->where($where2);
            $this->db->delete($table);
        }
        
    }
    