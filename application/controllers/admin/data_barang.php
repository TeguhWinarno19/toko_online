<?php

class Data_barang extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Barang | Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambah_aksi()
    {
        $nama_brg       = $this->input->post('nama_brg');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar']['name'];
        if ($gambar = ''){}else{
            $config ['upload_path'] ='./uploads';
            $config ['allowed_types'] ='jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo 'Gambar gagal';
            }
            else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array (
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar
        );
        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }
    public function edit($id)
    {
        $where = array('id_brg' =>$id);
        $data['title'] = 'Edit Data | Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function update()
    {
        $id                 = $this->input->post('id_brg');
        $nama_brg           = $this->input->post('nama_brg');
        $keterangan         = $this->input->post('keterangan');
        $kategori           = $this->input->post('kategori');
        $harga              = $this->input->post('harga');
        $stok               = $this->input->post('stok');

        $data = array(
            'nama_brg'      => $nama_brg,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok
        );
        $where = array(
            'id_brg' => $id
        );
        $this->model_barang->update_data($where,$data,'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function detail($id_brg)
    {
        $data['title'] = 'Cake Longue | Detail Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates_admin/header' , $data);
        $this->load->view('templates_admin/sidebar' , $data);
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('templates_admin/footer' , $data);
    }

    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}