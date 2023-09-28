<?php

class M_Kendaraan extends CI_Model
{
    public function getwhere_kendaraan($data)
    {
        $query = $this->db->select('tb_kendaraan.*, tb_fakultas.fakultas')
        ->from('tb_kendaraan')
        ->join('tb_fakultas','tb_kendaraan.fakultas=tb_fakultas.id','inner')
        ->order_by('tb_kendaraan.identitas','asc')
        ->where($data)
        ->get();
        return $query;
    }

    public function insert_kendaraan($data)
    {
        $this->db->insert('tb_kendaraan',$data);
        return $this->db->insert_id();
    }

    public function update_kendaraan($cond, $data)
    {
        $this->db->where($cond);
        $this->db->update('tb_kendaraan', $data);
    }

    public function del_kendaraan($data)
    {
        $this->db->where($data);
        $this->db->delete('tb_kendaraan');
    }
    
}