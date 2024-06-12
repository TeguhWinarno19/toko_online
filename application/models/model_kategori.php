<?php

class Model_kategori extends CI_Model
{
    public function data_cake()
    {
        return $this->db->get_where('tb_barang',array('kategori' => 'cake'));
    }
    public function data_cookies()
    {
        return $this->db->get_where('tb_barang',array('kategori' => 'cookies'));
    }
    public function data_candy()
    {
        return $this->db->get_where('tb_barang',array('kategori' => 'candy'));
    }
    public function data_hampers()
    {
        return $this->db->get_where('tb_barang',array('kategori' => 'hampers'));
    }
    public function data_accesories()
    {
        return $this->db->get_where('tb_barang',array('kategori' => 'accesories'));
    }
}