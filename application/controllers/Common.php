<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Fakultas');
        
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $nama['nama'] = $this->M_Pengumuman->get_nama(array('username'=>$username))->row();
        $this->load->view('layout/header', $nama);
        $this->load->view('penguji/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function not_found()
    {
        $this->load->view("not_found");
    }

    public function download()
    {
        $role = $this->session->userdata('role');
        $qr = $this->input->get('qr');
        $cek = $this->M_Kendaraan->getwhere_kendaraan(['qr'=>$qr])->row();
        if(empty($cek)){
            redirect('common/not_found');
        }
        $data['kendaraan'] = $cek;
        $this->load->view('qr',$data);
    }

    public function scan()
    {
        $role = $this->session->userdata('role');
        $qr = $this->input->get('qr');
        $jenis = $this->M_Kendaraan->getwhere_kendaraan(['qr'=>$qr])->row()->jenis;
        if($role=="3"){
            redirect(base_url("user/scan?qr=$qr&j=$jenis"));
        }
        else {
            redirect(base_url("welcome"));
            $this->session->set_flashdata('info', '<div class="alert alert-danger" style="margin-top: 3px">
            <div class="header"><b><i class="fas fa-fw fa-exclamation-circle"></i> OOooppss!!</b> Silahkan login atau sign up terlebih dahulu</div></div>');
        }
    }

}