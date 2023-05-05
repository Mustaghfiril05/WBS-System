<?php
class Identitas_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                $this->load->database();
        }

        public function insert_identitas($data)
        {
                $this->db->insert('identitas_pelapor',$data,FALSE);
                
        }

        public function get_identitas($data)
        {
                $this->db->from('identitas_pelapor',FALSE);
                $this->db->where('id_laporan',$data,FALSE);
                $query = $this->db->get();

                return $query->row();                
        } 
}