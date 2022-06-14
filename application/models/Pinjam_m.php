<?php

/**
 * 
 */
class Pinjam_m extends CI_model
{

	public function disp_pinjam()
	{
		$this->db->select('*');
		$this->db->from('sedang_dipinjam');
		$this->db->join('user', 'user.id=sedang_dipinjam.id_user', 'left');
		$this->db->join('motor', 'motor.id_motor = sedang_dipinjam.id_motor', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function disp_konf()
	{
		$this->db->select('*');
		$this->db->from('butuh_konfirmasi');
		$this->db->join('user', 'user.id=butuh_konfirmasi.id_user', 'left');
		$this->db->join('motor', 'motor.id_motor = butuh_konfirmasi.id_motor', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getbyId($id)
	{
		return $this->db->get_where('sedang_dipinjam', ['id_pinjam' => $id])->row_array();
	}

	public function addriwayat()
	{
		$data = [
			"id_user" => $this->input->post('id_user', true),
			"id_motor" => $this->input->post('id_motor', true),
			"tanggal_kembali" => $this->input->post('tanggal_kembali', true),
			"tanggal_pinjam" => $this->input->post('tanggal_pinjam', true),
			"paket" => $this->input->post('paket', true)
		];
		$data2 = [
			"jumlah" => $this->input->post('jumlah', true)
		];
		$this->db->where('id_motor', $this->input->post('id_motor'));
		$this->db->update('motor', $data2);
		$this->db->insert('riwayat', $data);

		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function delriwayat($id_pinjam)
	{
		$this->db->where('id_pinjam', $id_pinjam);
		$this->db->delete('sedang_dipinjam');
	}

	public function addkonfirmasi()
	{
		$data = [

			"id_user" => $this->input->post('id_user', true),
			"id_motor" => $this->input->post('id_motor', true),
			"status_pinjaman" => $this->input->post('status_pinjaman', true),
			"paket" => $this->input->post('paket', true),
			"waktu_pinjam" => $this->input->post('waktu_pinjam', true),
		];

		$data2 = [
			"jumlah" => $this->input->post('jumlah', true)
		];

		$this->db->where('id_motor', $this->input->post('id_motor'));
		$this->db->update('motor', $data2);
		$this->db->insert('sedang_dipinjam', $data);

		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function delmemintakonf($id_sdpinjam)
	{
		$this->db->where('id_sdpinjam', $id_sdpinjam);
		$this->db->delete('butuh_konfirmasi');
	}
}
