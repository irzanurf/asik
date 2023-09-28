<?php

class M_Fakultas extends CI_Model
{
    public function get_lokasi()
    {
        $query = $this->db->select('*')
        ->from('tb_fakultas')
        ->order_by('fakultas','asc')
        ->get();
        return $query;
    }

    public function getwhere_lokasi($data)
    {
        $query = $this->db->select('*')
        ->from('tb_fakultas')
        ->where($data)
        ->order_by('fakultas','asc')
        ->get();
        return $query;
    }

    public function check_lokasi($data)
    {
        $query = $this->db->select('*')
        ->from('tb_fakultas')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            return 0;
        }
        else{
            return 1;
        } 
    }
    
}