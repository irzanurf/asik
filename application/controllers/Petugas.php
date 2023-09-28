<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "2"){
            redirect("welcome/");
        }
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Aktivitas');
        $this->load->model('M_Fakultas');
        $this->load->model('M_Profile');
    }

    public function index()
    {
        $id_user = $this->session->userdata('username');
        // $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        // $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header_ptg');
        $this->load->view('petugas/dashboard');
        // $this->load->view("layout/footer");
        $this->load->view('layout/alert');
        // $this->load->view('layout/navbar');
    }

    public function finish()
    {
        $id = $this->input->post('id');
        $date = date('Y-m-d H:i:s');
        $cond = ['id'=>"$id"];
        $data = [
            'status'=>"1",
            'checkout'=>$date,
        ];
        $this->M_Aktivitas->update_aktivitas($cond, $data);
        $this->session->set_flashdata('info', "<div class='alert alert-success' style='margin-top: 3px'>
                <div class='header'><b><i class='fas fa-fw fa-exclamation-circle'></i> SUCCESS</b> Terimakasih peminjaman berhasil diselesaikan :)</div></div>");
                redirect(base_url("petugas/aktivitas_sepeda"));
    }

    public function daftar_sepeda()
    {
        $username = $this->session->userdata('username');
        
        $data['view'] = $this->M_Kendaraan->getwhere_kendaraan(["tb_kendaraan.jenis"=>"1"])->result();
        $data['lokasi'] = $this->M_Fakultas->getwhere_lokasi(['username'=>"$username"])->row();
        $data['jenis'] = "Sepeda";
        $this->load->view('layout/header_ptg');
        $this->load->view('petugas/daftar_kendaraan', $data);
        $this->load->view('layout/alert');
        // $this->load->view('layout/navbar');
    }

    public function aktivitas_sepeda()
    {
        $username = $this->session->userdata('username');
        $data['view'] =  $this->M_Aktivitas->getwhere_aktivitas(['tb_kendaraan.jenis'=>"1", 'tb_fakultas.username'=>"$username"])->result();
        $data['lokasi'] = $this->M_Fakultas->get_lokasi()->result();
        $data['jenis'] = "Sepeda";
        $this->load->view('layout/header_ptg');
        $this->load->view('petugas/daftar_aktivitas', $data);
        $this->load->view('layout/alert');
        // $this->load->view('layout/navbar');
    }

    public function tambah_kendaraan()
    {
        $jenis = $this->input->post('jenis');
        $identitas = $this->input->post('nama');
        $fakultas = $this->input->post('fakultas');
        $date = date('Y-m-d', strtotime(date('Y-m-d')));

        $data = [
            'identitas'=>"$identitas",
            'jenis'=>$jenis,
            'fakultas'=>$fakultas,
            'date'=>"$date",
        ];
        $id = $this->M_Kendaraan->insert_kendaraan($data);

        $qr = md5("$id+$identitas+$date");
        $cond = ["id"=>$id];
        $new_data = ["qr"=>"$qr"];
        if($jenis==1){
            $redirect = "daftar_sepeda";
        }
        elseif($jenis==2){
            $redirect = "daftar_bus";
        }
        $this->M_Kendaraan->update_kendaraan($cond, $new_data);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fas fa-fw fa-exclamation-circle"></i> SUCCESS</b> Kendaraan berhasil ditambahkan</div></div>');
        redirect(base_url("petugas/$redirect"));
        
    }

    public function hapus_kendaraan(){
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        if($jenis==1){
            $redirect = "daftar_sepeda";
        }
        elseif($jenis==2){
            $redirect = "daftar_bus";
        }
        $this->M_Kendaraan->del_kendaraan(["id"=>$id]);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Kendaraan berhasil dihapus</div></div>');
        redirect(base_url("petugas/$redirect"));
    }

}