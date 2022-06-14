<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->library('form_validation');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['user'] = $this->User_m->disp_user();
		$this->load->view('user_v', $data);
	}

	public function add()
	{
		$data['user'] = $this->User_m->disp_user();
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_v', $data);
		} else {
			$data['user'] = $this->User_m->disp_user();
			$this->User_m->tambah_user(); //Fungsi Utama tambah data
			$this->session->set_flashdata('flash', 'Berhasil Menambahkan Akun Penyewa Baru');
			sleep(1);
			redirect('User', $data);
		}
	}

	public function ubah($id)
	{

		$this->form_validation->set_rules('username', 'Nama', 'required');
		$data['user'] = $this->User_m->getbyId($id);

		if ($this->form_validation->run() == false) {

			$this->load->view('ubahuser_v', $data);
		} else {

			$this->User_m->update();
			sleep(1);
			redirect('User');
		}
	}

	public function del($id)
	{
		$data['user'] = $this->User_m->disp_user();
		$this->User_m->hapus($id);
		sleep(1);
		redirect('User', $data);
	}
}
