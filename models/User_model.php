<?php
class User_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                $this->load->database();
        }

        public function get_all_user()
        {
                $query = $this->db->query('select * from users');
                return $query->result();
        }

        public function login($email)
        {                 
                $query = $this->db-> query('select * from users where username = ?', array($email));
                 
                return $query->row();
        }

        public function insert_user($data)
        {
                $this->db->insert('users',$data,false);
                
        }
        public function getAll_direksi()
        {
                $this->db->from('users',false);
                $this->db->where('level','direksi');
                $query = $this->db->get();

                return $query->result();                
        }
        public function get_direksi_one()
        {
                $this->db->from('users',false);
                // $this->db->where('level','direksi');
                $this->db->where('jabatan','Direktur Utama');
                $query = $this->db->get();

                return $query->row();                
        }

        public function get_user($data)
        {
                $this->db->from('users',false);
                $this->db->where('id_user',$data,false);
                $query = $this->db->get();

                return $query->row();                
        }


        public function update_user($id_user,$data)
        {
                $this->db->where('id_user',$id_user,false);
                $this->db->update('users',$data,null,false);                
        }

        public function delete_user($id_user,$data)
        {
                $this->db->where('id_user',$id_user,false);
                $this->db->update('users',$data,null,false);                
        }

}