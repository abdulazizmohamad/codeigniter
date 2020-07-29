<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_satudata()
    {
      //get ada agar data yang tampil descending
      $this->db->order_by('id','DESC');
      $query = $this->db->get('tb_tanah');
      return $query->result();
    }
     
    function get_data(){
      $this->db->select('date,tanah');
      $result = $this->db->get('tb_tanah');
      return $result;
    }

    function data_grafik(){
      return $this->db->query("SELECT tanah, date as tanggal FROM tb_tanah GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    public function getAlldata()
    {
      return $this->db->get('tb_tanah')->result_array();
    }

    public function getdataTabel($limit, $start, $keyword = null)
    {
      if($keyword){
        $this->db->like('tanah', $keyword);
        $this->db->or_like('date', $keyword);
      }
      return $this->db->get('tb_tanah', $limit, $start)->result_array();
    }
    public function countAlldata()
    {
      return $this->db->get('tb_tanah')->num_rows();
    }
    

    public function report(){
        $query = $this->db->query("SELECT * from tb_tanah");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function data_list()
    {
      $hasil=$this->db->query("SELECT * FROM tb_tanah ORDER BY id DESC");
      return $hasil->result();
    }
}