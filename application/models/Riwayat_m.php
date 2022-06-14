<?php

/**
 * 
 */
class Riwayat_m extends CI_model
{

	public function disp_riwayat()
	{
		$this->db->select('*');
		$this->db->from('riwayat');
		$this->db->join('user', 'user.id=riwayat.id_user', 'left');
		$this->db->join('motor', 'motor.id_motor = riwayat.id_motor', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getbyId($id)
	{
		return $this->db->get_where('riwayat', ['id_riwayat' => $id])->row_array();
	}
}
