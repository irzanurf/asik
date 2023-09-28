<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use NcJoes\OfficeConverter\OfficeConverter;
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
        $this->load->model('M_Admin');
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Aktivitas');
        $this->load->model('M_Fakultas');
    }

    
    public function index()
    {
        $username = $this->session->userdata('username');
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/dashboard');
        // $this->load->view("layout/footer");
    }

    public function header(){
        $head['username'] = $this->session->userdata('username');
        // $head['role'] = $this->session->userdata('role');
        $head['nama'] = $this->session->userdata('nama');
        $this->load->view('layout/header_admin', $head);
    }

    public function daftar_sepeda()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Kendaraan->getwhere_kendaraan(["tb_kendaraan.jenis"=>"1"])->result();
        $data['lokasi'] = $this->M_Fakultas->get_lokasi()->result();
        $data['jenis'] = "Sepeda";
        $this->header();
        $this->load->view('admin/daftar_kendaraan', $data);
        $this->load->view('layout/alert');
        // $this->load->view('layout/navbar');
    }

    public function daftar_bus()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Kendaraan->getwhere_kendaraan(["tb_kendaraan.jenis"=>"2"])->result();
        $data['lokasi'] = $this->M_Fakultas->get_lokasi()->result();
        $data['jenis'] = "Bus";
        $this->header();
        $this->load->view('admin/daftar_kendaraan', $data);
        $this->load->view('layout/alert');
        // $this->load->view('layout/navbar');
    }

    public function tambah_kendaraan()
    {
        $jenis = $this->input->post('jenis');
        $identitas = $this->input->post('nama');
        $fakultas = $this->input->post('fakultas');
        $keterangan = $this->input->post('keterangan');
        $date = date('Y-m-d', strtotime(date('Y-m-d')));

        $data = [
            'identitas'=>"$identitas",
            'jenis'=>$jenis,
            'fakultas'=>$fakultas,
            'keterangan'=>$keterangan,
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
        redirect(base_url("Admin/$redirect"));
        
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
        redirect(base_url("Admin/$redirect"));
    }
   
    public function aktivitas_sepeda()
    {
        $username = $this->session->userdata('username');
        $data['view'] =  $this->M_Aktivitas->getwhere_aktivitas(['tb_kendaraan.jenis'=>"1"])->result();
        $data['lokasi'] = $this->M_Fakultas->get_lokasi()->result();
        $data['jenis'] = "Sepeda";
        $this->header();
        $this->load->view('admin/daftar_aktivitas', $data);
        $this->load->view('layout/alert');
        // $this->load->view('layout/navbar');
    }

    public function aktivitas_bus()
    {
        $username = $this->session->userdata('username');
        $data['view'] =  $this->M_Aktivitas->getwhere_aktivitas(['tb_kendaraan.jenis'=>"2"])->result();
        $data['lokasi'] = $this->M_Fakultas->get_lokasi()->result();
        $data['jenis'] = "Bus";
        $this->header();
        $this->load->view('admin/daftar_aktivitas', $data);
        $this->load->view('layout/alert');
        // $this->load->view('layout/navbar');
    }

    public function finish()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $date = date('Y-m-d H:i:s');
        $cond = ['id'=>"$id"];
        $data = [
            'status'=>"1",
            'checkout'=>$date,
        ];
        $this->M_Aktivitas->update_aktivitas($cond, $data);
        if($jenis==1){
            $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fas fa-fw fa-exclamation-circle"></i> SUCCESS</b> Peminjaman berhasil diselesaikan</div></div>');
        redirect(base_url("admin/aktivitas_sepeda"));
        }
        elseif($jenis==2){
            $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
        <div class="header"><b><i class="fas fa-fw fa-exclamation-circle"></i> SUCCESS</b> Perjalanan berhasil diselesaikan</div></div>');
        redirect(base_url("admin/aktivitas_bus"));
        }
    }
}