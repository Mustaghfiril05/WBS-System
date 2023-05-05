<?php
class Laporan_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                $this->load->database();
        }

        public function insert_laporan($data)
        {
                $this->db->insert('laporan',$data,FALSE);
                
        }

        public function insert_progress_laporan($data)
        {
                $this->db->insert('progress_laporan',$data,FALSE);
                
        }

        public function get_laporan($data)
        {       
                $this->db->select("
                                IFNULL(identitas_pelapor.email_pelapor,'Anonim') created_by,
                                laporan.*,
                                (
                                        SELECT
                                                
                                                prog.jenis_progress 
                                        FROM
                                                progress_laporan proglap
                                                INNER JOIN progress prog ON prog.id_progress = proglap.id_progress 
                                        WHERE
                                                proglap.id_laporan = laporan.id_laporan 
                                                ORDER BY id_progress_laporan DESC
                                                LIMIT 1
                                        ) last_progress,
                                        (
                                                SELECT
                                                        proglap.id_progress_laporan
                                                FROM
                                                        progress_laporan proglap
                                                WHERE
                                                        proglap.id_laporan = laporan.id_laporan 
                                                        ORDER BY id_progress_laporan DESC
                                                        LIMIT 1
                                                ) id_last_progress,
                                        (
                                                SELECT
                                                        proglap.is_approved
                                                FROM
                                                        progress_laporan proglap
                                                WHERE
                                                        proglap.id_laporan = laporan.id_laporan 
                                                        ORDER BY id_progress_laporan DESC
                                                        LIMIT 1
                                                ) status_last_progress 
                        ");
                $this->db->from('laporan',FALSE);
                $this->db->join('identitas_pelapor', 'identitas_pelapor.id_laporan = laporan.id_laporan', 'left');
                $this->db->where('laporan.id_laporan',$data,false);
                $query = $this->db->get();

                return $query->row();                
        } 
        public function str_id_laporan($id_prog){
                $sql="SELECT id_laporan, 
                                (
                                SELECT
                                        proglap.id_progress 
                                FROM
                                        progress_laporan proglap
                                WHERE
                                        proglap.id_laporan = A.id_laporan 
                                        ORDER BY id_progress_laporan DESC
                                        LIMIT 1
                                ) last_progress
                        FROM laporan A
                        HAVING last_progress='".$id_prog."'";
                $query = $this->db->query($sql)->result();
                
                $str="'0'";
                if(count($query)>0){
                        foreach ($query as $row) {
                                $str.="'".$row->id_laporan."',";
                        }
                }
                return rtrim($str,",");
        }

        public function get_all_laporan($id=null)
        {       
                $where="";
                if(isset($_GET['prog']) && $_GET['prog']!= null && $_GET['prog']!= "" ){
                        
                        $where.=" AND A.id_laporan IN (".$this->str_id_laporan($_GET['prog']).")";
                        // $where.=" AND A.id_laporan IN (SELECT id_laporan FROM progress_laporan WHERE id_progress='".$_GET['prog']."')";
                }
                if(isset($_GET['plg']) && $_GET['plg']!= null && $_GET['plg']!= "" ){
                        $where.=" AND A.id_masalah='".$_GET['plg']."'";
                }

                if($id!=null){
                        $where.=" AND A.id_laporan='".$id."'";
                }

                $query = $this->db->query("
                        SELECT 
                        IFNULL((SELECT id_identitas_pelapor FROM identitas_pelapor WHERE id_laporan=A.id_laporan  ),'anonim') id_pelapor,
                        IFNULL((SELECT nama_pelapor FROM identitas_pelapor WHERE id_laporan=A.id_laporan  ),'Anonim') pelapor,
                        A.*, (tanggal_pembuatan) CREATED_DATE_F,
                	(
                                SELECT
                                        
                                        prog.jenis_progress 
                                FROM
                                        progress_laporan proglap
                                        INNER JOIN progress prog ON prog.id_progress = proglap.id_progress 
                                WHERE
                                        proglap.id_laporan = A.id_laporan 
                                        ORDER BY id_progress_laporan DESC
                                        LIMIT 1
                                ) last_progress,
                                M.jenis_masalah
                FROM laporan A
                INNER JOIN  masalah M on M.id_masalah=A.id_masalah
                WHERE A.tanggal_pembuatan is not null ".$where."
                ORDER BY A.tanggal_pembuatan ASC");
                //$this->db->from('laporan',FALSE);
                //$query = $this->db->get();

                //return $query;  
                if($query->num_rows() > 0)
                {
                        return $query;
                }
                else
                {
                        return FALSE;
                }
                //return $hasil->result();                
        } 

        public function check_laporan($id_laporan,$laporan_token)
        {
                $this->db->from('laporan',FALSE);
                $this->db->where('id_laporan',$id_laporan,false);
                $this->db->where('password_id_laporan',$laporan_token,false);
                $query = $this->db->get();

                return $query;                
        } 

        public function check_progress_laporan($id_laporan,$laporan_token,$progress)
        {
                $this->db->from('progress_laporan',FALSE);
                $this->db->where('id_laporan',$id_laporan,false);
                // $this->db->where('password_id_laporan',$laporan_token,false);
                $this->db->where('id_progress',$progress,false);
                $query = $this->db->get();

                return $query ;
        }

        

        public function get_last_id_laporan($data)
        {
                $this->db->from('masalah',FALSE);
                $this->db->where('id_masalah',$data,false);
                $query = $this->db->get();

                return $query->row();                
        } 

        public function get_all_progress()
        {
                //$query = $this->db->query("SELECT A.*, (CREATED_DATE) CREATED_DATE_F FROM LAPORAN A");
                $this->db->from('progress',FALSE);
                $this->db->not_like('id_progress','PRO1');
                $query = $this->db->get();

                return $query ;           
        } 
}