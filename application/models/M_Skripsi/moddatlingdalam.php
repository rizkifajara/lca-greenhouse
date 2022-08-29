<?php

class Moddatlingdalam extends CI_Model{

    public function tampil_data($user_id){
		// return $this->db->get('datlingdalam');
        $this->db->from('datlingdalam');
        $this->db->where('userId', $user_id);
        
        $query = $this->db->get();
        return $query;


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
            $query = $this->db->get_where('datlingdalam', array('id' =>$id))->row();
            return $query;
        }
 
	
}