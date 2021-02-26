<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomePage_Model extends CI_Model
{
    public function tampil_data_info_yagami()
    {
        $id_info_yagami = 1;
        return $this->db->get_where('tbl_info_yagami', ['id_info_yagami' => $id_info_yagami])->row_array();
    }

    public function tambah_data_akun($data)
    {
        $this->db->insert('tbl_akun', $data);
    }

    public function ubah_data_akun($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tambah_alamat_user($data)
    {
        $this->db->insert('tbl_alamat_user', $data);
    }

    public function tampil_alamat_user($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result_array();
    }

    public function hapus_alamat_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function ubah_alamat_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampil_produk()
    {
        $query = $this->db->get('tbl_produk');
        return $query->result_array();
    }

    public function tambah_keranjang($data)
    {
        $this->db->insert('tbl_keranjang', $data);
    }

    public function hapus_keranjang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function tambah_buat_pesanan($data)
    {
        $this->db->insert_batch('tbl_buat_pesanan', $data);
    }

    public function tambah_hubungi_kami($data)
    {
        $this->db->insert('tbl_hubungi_kami', $data);
    }

    public function ubah_jumlah_beli($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ubah_info_web($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampil_data_produk()
    {
        $query = $this->db->get('tbl_produk');
        return $query->result_array();
    }

    public function tambah_data_produk($data)
    {
        $this->db->insert('tbl_produk', $data);
    }

    public function hapus_produk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function ubah_data_produk($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampil_data_akun()
    {
        $query = $this->db->get('tbl_akun');
        return $query->result_array();
    }

    public function hapus_akun_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function tampilPesanan()
    {
        $query = $this->db->get('tbl_buat_pesanan');
        return $query->result_array();
    }
    public function proses_pesanan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function tampilHubungiKami()
    {
        $query = $this->db->get('tbl_hubungi_kami');
        return $query->result_array();
    }
    public function hapus_pesanan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    // menghitung baris
    public function hitungBaris($table)
    {
        return $this->db->get($table)->num_rows();
    }
    public function ambilData($table, $limit, $start)
    {
        return $this->db->get($table, $limit, $start)->result_array();
    }
}
