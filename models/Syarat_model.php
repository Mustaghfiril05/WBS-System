<?php
class Syarat_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                $this->load->database();
        }

        public function get_all_user()
        {
                $query = $this->db->query('select * from master_user where status = 1 order by id_user asc');
                return $query->result();
        }

        public function login($email,$password)
        {                 
                $query = $this -> db -> query('select * from master_user where email = ? and password = ?', array($email,$password));
                 
                return $query->result();
        }

        public function insert_user($data)
        {
                $this->db->insert('master_user',$data,false);
                
        }

        public function get_user($data)
        {
                $this->db->from('master_user',false);
                $this->db->where('id_user',$data,false);
                $query = $this->db->get();

                return $query->row();                
        }


        public function update_user($id_user,$data)
        {
                $this->db->where('id_user',$id_user,false);
                $this->db->update('master_user',$data,null,false);                
        }

        public function delete_user($id_user,$data)
        {
                $this->db->where('id_user',$id_user,false);
                $this->db->update('master_user',$data,null,false);                
        }

}