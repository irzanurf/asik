<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "3"){
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
        $data['aktivitas'] = $this->M_Aktivitas->getwhere_aktivitas(['tb_aktivitas.id_user'=>"$id_user", 'tb_aktivitas.status'=>"0"])->result();
        $this->load->view('layout/header');
        $this->load->view('user/dashboard', $data);
        // $this->load->view("layout/footer");
        $this->load->view('layout/alert');
        $this->load->view('layout/navbar');
    }

    public function scanner_qr()
    {
        $this->load->view('user/scanner');
    }

    public function scan()
    {
        $qr = $this->input->get('qr');
        $jenis = $this->input->get('j');
        // print_r($qr);
        // print_r($jenis);
        $id_user = $this->session->userdata('username');
        $date = date('Y-m-d H:i:s');
        // $id_user = $this->M_Profile->getwhere_user(['username'=>"$username"])->row()->id;
        $cek = $this->M_Kendaraan->getwhere_kendaraan(['qr'=>$qr])->row();
        $nama_pengguna = $this->M_Profile->getwhere_profile(['id_user'=>"$id_user"])->row()->nama;
        $checkin = ["checkin"=>$date];
        $data_cek = [
            "id_kendaraan"=>"$cek->id",
            "id_user"=>"$id_user",
            "status"=>"0",
        ];

        $data_cek_sepeda = [
            "id_kendaraan"=>"$cek->id",
            "status"=>"0",
        ];

        if($jenis==1){
            $this->M_Aktivitas->check_sepeda($data_cek_sepeda);
        }
        
        $this->M_Aktivitas->check_user($data_cek, $checkin, $jenis);
        if($jenis==1){
            $this->session->set_flashdata('info', "<div class='alert alert-success' style='margin-top: 3px'>
                <div class='header'><b><i class='fas fa-fw fa-exclamation-circle'></i> YEAYY</b> $nama_pengguna telah bersama $cek->identitas. Dijaga dengan segenap hati yaa.. :)</div></div>");
                redirect(base_url("user"));
        }
        elseif($jenis==2){
            $this->session->set_flashdata('info', "<div class='alert alert-success' style='margin-top: 3px'>
                <div class='header'><b><i class='fas fa-fw fa-exclamation-circle'></i> YEAYY</b> Selamat menikmati perjalanmu, semoga selamat sampai tujuan :)</div></div>");
                redirect(base_url("user"));
        }
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
                <div class='header'><b><i class='fas fa-fw fa-exclamation-circle'></i> YEAYY</b> Terimakasih perjalan berhasil diselesaikan :)</div></div>");
                redirect(base_url("user"));
    }

    public function aktivitas()
    {
        $id_user = $this->session->userdata('username');
        $data['aktivitas'] = $this->M_Aktivitas->getwhere_aktivitas(['tb_aktivitas.id_user'=>"$id_user"])->result();
        $this->load->view('layout/header');
        $this->load->view('user/aktivitas', $data);
        $this->load->view("layout/footer");
        $this->load->view('layout/alert');
        $this->load->view('layout/navbar');
    }

    public function daftar_sepeda(){
        $lokasi = $this->input->get('lokasi');
        $id_user = $this->session->userdata('username');
        $check_lokasi = $this->M_Fakultas->check_lokasi(['id'=>"$lokasi"]);
        if($check_lokasi==0 || empty($lokasi)){
            $data['lokasi'] = $this->M_Fakultas->get_lokasi()->result();
            $this->load->view('layout/header');
            $this->load->view('user/daftar_lokasi', $data);
            $this->load->view("layout/footer");
            $this->load->view('layout/alert');
            $this->load->view('layout/navbar');
        }
        else{
            // $data['kendaraan'] = $this->M_Kendaraan->getwhere_kendaraan_user("(tb_kendaraan.jenis=1 AND (tb_aktivitas.status=1 OR tb_aktivitas.status=NULL))")->result();
            $data['kendaraan'] = $this->M_Kendaraan->getwhere_kendaraan(['tb_kendaraan.jenis'=>"1", 'tb_kendaraan.fakultas'=>"$lokasi"])->result();
            $data['avail'] = $this->M_Aktivitas->get_avail(['tb_aktivitas.status'=>"0"])->result();
            // print_r($data['avail']);
            $this->load->view('layout/header');
            $this->load->view('user/daftar_sepeda', $data);
            $this->load->view("layout/footer");
            $this->load->view('layout/alert');
            $this->load->view('layout/navbar');
        }
    }

    public function daftar_bus(){
        $data['kendaraan'] = $this->M_Kendaraan->getwhere_kendaraan(['tb_kendaraan.jenis'=>"2"])->result();
        // $data['avail'] = $this->M_Aktivitas->get_avail(['tb_aktivitas.status'=>"0"])->result();
        $this->load->view('layout/header');
        $this->load->view('user/daftar_bus', $data);
        $this->load->view("layout/footer");
        $this->load->view('layout/alert');
        $this->load->view('layout/navbar');
    }

    public function profile()
    {
        $username = $this->session->userdata('username');
        $data['profile'] = $this->M_Profile->getwhere_profile(['id_user'=>"$username"])->row();
        $this->load->view('layout/header');
        $this->load->view('user/profile', $data);
        // $this->load->view("layout/footer");
        $this->load->view('layout/alert');
        $this->load->view('layout/navbar');
    }

}