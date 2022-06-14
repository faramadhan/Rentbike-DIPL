<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pinjam_m');
		$this->load->library('form_validation');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['pinjam'] = $this->Pinjam_m->disp_pinjam();
		$data['addkonf'] = $this->Pinjam_m->disp_konf();
		$this->load->view('pinjam_v', $data);
	}

	public function del($id_sdpinjam)
	{
		$data['pinjam'] = $this->Pinjam_m->disp_pinjam();
		$this->Pinjam_m->delmemintakonf($id_sdpinjam);
		sleep(2);
		redirect('Pinjam', $data);
	}


	public function addriwayat($id_pinjam)
	{
		$data['riwayat'] = $this->Pinjam_m->disp_pinjam();

		if ($this->Pinjam_m->addriwayat() == true) {
			$this->Pinjam_m->delriwayat($id_pinjam);
			sleep(1);
			redirect('Pinjam', $data);
		} else {
			echo "Gagal Insert Riwayat";
		}
	}

	public function addkonfirmasi($id_sdpinjam)
	{
		$data['addkonf'] = $this->Pinjam_m->disp_konf();

		if ($this->Pinjam_m->addkonfirmasi() == true) {
			$this->Pinjam_m->delmemintakonf($id_sdpinjam);
			sleep(1);
			redirect('Pinjam', $data);
		} else {
			echo "Gagal insert Konfirmasi";
		}
	}
}
