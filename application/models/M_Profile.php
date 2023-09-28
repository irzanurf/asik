<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profile extends CI_Model
{
    public function getwhere_user($data)
    {
        $query = $this->db->select('*')
        ->from('tb_users')
        ->where($data)
        ->get();
        return $query;
    }

    public function getwhere_profile($data)
    {
        $query = $this->db->select('tb_profiles.*, tb_fakultas.fakultas')
        ->from('tb_profiles')
        ->join('tb_fakultas','tb_profiles.id_fakultas=tb_fakultas.id','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function insert_profile($akun,$username,$Nim)
    {
        $query = $this->db->query("SELECT * FROM tb_profiles WHERE id_user = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $query = $this->db->query("SELECT * FROM tb_profiles WHERE nim = '$nim'");
            $result = $query->result_array();
            $count1 = count($result);
            if (empty($count1)){
                $this->db->insert('tb_profiles',$akun);
            }
            else{
                $this->session->set_flashdata('info','<div class="alert alert-danger" style="margin-top: 3px">
                <div class="header"><b><i class="fa fa-exclamation-circle"></i> ALERT!</b> NIM anda sudah terdaftar</div></div>' );
                redirect(base_url("Welcome"));
            }
        }
        else{
            $this->session->set_flashdata('info','<div class="alert alert-danger" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ALERT!</b> Username sudah ada</div></div>' );
            redirect(base_url("Welcome"));
        }   
    }

    public function insert_akun($akun,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_users',$akun);
        }
        else{
            
        }   
    }
    
}