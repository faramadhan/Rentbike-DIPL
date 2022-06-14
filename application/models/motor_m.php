<?php

/**
 * 
 */
class motor_m extends CI_model
{

    public function disp_motor()
    {
        return $this->db->get('motor')->result_array();
    }


    public function tambah()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "merk" => $this->input->post('merk', true),
            "tahun" => $this->input->post('tahun', true),
            "harga" => $this->input->post('harga', true),
            "jumlah" => $this->input->post('jumlah', true)
        ];

        $this->db->insert('motor', $data);
    }

    public function hapus($id_motor)
    {
        $this->db->where('id_motor', $id_motor);
        $this->db->delete('motor');
    }

    public function getbyId($id_motor)
    {
        return $this->db->get_where('motor', ['id_motor' => $id_motor])->row_array();
    }

    public function update()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "merk" => $this->input->post('merk', true),
            "tahun" => $this->input->post('tahun', true),
            "harga" => $this->input->post('harga', true),
            "jumlah" => $this->input->post('jumlah', true)
        ];

        $this->db->where('id_motor', $this->input->post('id_motor'));
        $this->db->update('motor', $data);
    }

    public function add_m_konfirmasi()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "id_motor" => $this->input->post('id_motor', true),
            "status_pinjaman" =>  $this->input->post('status_pinjaman', true),
            "paket" => $this->input->post('paket', true),
        ];
        $this->db->insert('butuh_konfirmasi', $data);
    }
}
