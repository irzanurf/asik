<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Aktivitas extends CI_Model
{
    public function check_user($data_cek, $checkin, $jenis){
        $query = $this->db->select('*')
        ->from('tb_aktivitas')
        ->where($data_cek)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_aktivitas',$data_cek);
            $this->db->where($data_cek);
            $this->db->update('tb_aktivitas',$checkin);
        }
        else{
            if($jenis==1){
                $this->session->set_flashdata('info', '<div class="alert alert-warning" style="margin-top: 3px">
                <div class="header"><b><i class="fas fa-fw fa-exclamation-circle"></i> Peringatan!!</b> Kamu masih dalam status peminjaman sepeda ini, segera hubungi petugas untuk menyelesaikan peminjaman</div></div>');    
            }
            elseif($jenis==2){
                $this->session->set_flashdata('info', '<div class="alert alert-warning" style="margin-top: 3px">
                <div class="header"><b><i class="fas fa-fw fa-exclamation-circle"></i> Peringatan!!</b> Kamu masih dalam status perjalanan dengan bus ini, lakukan penyelesaian perjalanan terlebih dahulu pada aktivitas sebelumnya</div></div>');   
            }
            
            redirect(base_url("user"));
        }  
    }

    public function check_sepeda($data_cek){
        $query = $this->db->select('*')
        ->from('tb_aktivitas')
        ->where($data_cek)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            //DO NOTHING
        }
        else{
            $this->session->set_flashdata('info', '<div class="alert alert-warning" style="margin-top: 3px">
            <div class="header"><b><i class="fas fa-fw fa-exclamation-circle"></i> Peringatan!!</b> Maaf sepeda ini dalam status peminjaman :(</div></div>');
            redirect(base_url("user"));
        }  
    }

    public function check($data_cek, $checout){
        $this->db->where($data_cek);
        $this->db->update('tb_aktivitas',$checkout);
    }

    public function update_aktivitas($cond, $data){
        $this->db->where($cond);
        $this->db->update('tb_aktivitas',$data);
    }

    public function getwhere_aktivitas($data){
        $query = $this->db->select('tb_aktivitas.*, tb_kendaraan.jenis, tb_kendaraan.identitas, tb_fakultas.fakultas as lokasi, tb_profiles.nama as nama_user')
        ->from('tb_aktivitas')
        ->join('tb_kendaraan','tb_aktivitas.id_kendaraan=tb_kendaraan.id','inner')
        ->join('tb_profiles','tb_profiles.id_user=tb_aktivitas.id_user','inner')
        ->join('tb_fakultas','tb_kendaraan.fakultas=tb_fakultas.id','inner')
        ->where($data)
        ->order_by('tb_aktivitas.checkin','desc')
        ->get();
        return $query;
    }

    public function get_avail($data){
        $query = $this->db->select('*')
        ->from('tb_aktivitas')
        ->where($data)
        ->get();
        return $query;
    }
    
}