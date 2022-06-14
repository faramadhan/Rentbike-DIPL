<?php
defined('BASEPATH') or exit('No direct script access allowed');

class motor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('motor_m');
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['motor'] = $this->motor_m->disp_motor();
        $this->load->view('motor_v', $data);
    }

    public function add()
    {
        $data['motor'] = $this->motor_m->disp_motor();
        $this->form_validation->set_rules('nama', 'Nama Motor', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('motor_v', $data);
        } else {
            $data['motor'] = $this->motor_m->disp_motor();
            $this->motor_m->tambah(); //Fungsi Utama tambah data
            $this->session->set_flashdata('flash', 'Berhasil Menambahkan Motor');
            redirect('motor', $data);
        }
    }

    public function del($id_motor)
    {
        $data['motor'] = $this->motor_m->disp_motor();
        $this->motor_m->hapus($id_motor);
        $this->session->set_flashdata('flash', 'Berhasil Menghapus Motor');
        redirect('motor', $data);
    }

    public function ubah($id_motor)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $data['motor'] = $this->motor_m->getbyId($id_motor);

        if ($this->form_validation->run() == false) {
            $this->load->view('ubah_v', $data);
        } else {

            $this->motor_m->update();
            $this->session->set_flashdata('flash', 'Motor berhasil diubah!');
            redirect('motor');
        }
    }

    public function addPinjam()
    {
        $data['motor'] = $this->motor_m->disp_motor();
        $this->motor_m->add_m_konfirmasi();
        $this->session->set_flashdata('flash', 'Berhasil memasukkan motor ke daftar tunggu konfirmasi, silahkan tunggu konfirmasi admin.');
        sleep(1);
        redirect('motor');
    }
}
