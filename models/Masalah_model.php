<?php
class Masalah_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                $this->load->database();
        }

        public function get_all_masalah()
        {
                $this->db->from('masalah',FALSE);
                $this->db->order_by('id_masalah','ASC');
                $query = $this->db->get();
                return $query;  
                //return $hasil->result();                
        }

        public function get_all_progress()
        {
                $this->db->from('progress',FALSE);
                $this->db->order_by('id_progress','ASC');
                $query = $this->db->get();
                return $query;  
                //return $hasil->result();                
        }

        public function pieChart(){
            $year=isset($_GET['year'])?$_GET['year']:"";
            $month=isset($_GET['month'])?$_GET['month']:"";
            $where=($year!="")?" AND YEAR(tanggal_pembuatan)=".$year." AND MONTH(tanggal_pembuatan)=".$month:"";
            $q=$this->db->query("
                SELECT
                    prob.jenis_masalah name,
                    (SELECT COUNT(id_masalah) FROM laporan WHERE id_masalah=prob.id_masalah ".$where.") total
                FROM
                    masalah prob
                    
                    ORDER BY total DESC
                ")->result_array();

            $data_chart=[];
            $data_kosong=[];
            foreach ($q as $key => $value) {
                $data_chart[$key]['name']=$value['name'];
                $data_chart[$key]['total']=intval($value['total']);
                if(intval($value['total'])<1) $data_kosong[]=$value['name'];
            }
            if(count($q) == count($data_kosong)){
                $data_chart=['message'=>'<center><h5>Tidak ada data pada periode ini</h5></center>'];
            }
            
            return $data_chart;
        }
        public function LineChart(){
            $year=isset($_GET['year'])? " WHERE YEAR ( laporan.tanggal_pembuatan ) = ".$_GET['year']:"";
            
            
            $q=$this->db->query("
            SELECT
            DATE_FORMAT(laporan.tanggal_pembuatan,'%b') bulan,
                COUNT( laporan.id_masalah )  total
            FROM
                laporan 
                ".$year." 
                GROUP BY DATE_FORMAT(laporan.tanggal_pembuatan,'%b')
                ")->result_array();

            $data_chart=[];
            $data_kosong=[];
            $month_names = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
            foreach($month_names as $keym=> $month){
                $data_chart[$keym]['name']=$month;
                $data_chart[$keym]['total']=0;
                foreach ($q as $key => $value) {
                    if(strtolower($month) == strtolower($value['bulan']) ){
                        $data_chart[$keym]['total']=intval($value['total']);
                    }
                }
            }
            return $data_chart;
        } 
        public function insert_masalah($data)
        {
                $this->db->insert('masalah',$data,FALSE);
                
        }

        public function update_id_masalah($id_masalah,$data)
        {
                $this->db->where('id_masalah',$id_masalah,FALSE);
                $this->db->update('masalah',$data,NULL,FALSE);                
        }

        public function get_masalah($data)
        {
                $this->db->from('masalah',FALSE);
                $this->db->where('id_laporan',$data,FALSE);
                $query = $this->db->get();

                return $query->row();                
        } 

}