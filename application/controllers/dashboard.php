<?php

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Cake Longue | Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);

        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg
        );
        $this->cart->insert($data);
        redirect('dashboard');
    }
    public function detail_keranjang()
    {
        $data['title'] = 'Cake Longue | Keranjang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar' , $data);
        $this->load->view('keranjang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        
        redirect('dashboard/index');        
    }
    public function pembayaran()
    {
        $data['title'] = 'Cake Longue | Payment';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama','Name','required|trim');
        $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('no_telp','No_telp','required|trim');
        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header' , $data);
            $this->load->view('templates/sidebar' , $data);
            $this->load->view('pembayaran', $data);
            $this->load->view('templates/footer');   
        }
        else{
            $this->proses_pesanan();
        }
    }
    public function proses_pesanan()
    {
        $is_processed= $this->model_invoice->index();
        if($is_processed){
        $this->cart->destroy();
        $data['title'] = 'Cake Longue | Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar' , $data);
        $this->load->view('proses_pesanan' , $data);
        $this->load->view('templates/footer' , $data);
        } else {
            echo "Maaf, Pesanan anda Gagal di Proses";
        }
    }
    public function detail($id_brg)
    {
        $data['title'] = 'Cake Longue | Detail Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar' , $data);
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer' , $data);
    }
    public function caribarang()
    {

        $cari = $this->input->post('search');
        $data['title'] = 'Cake Longue | Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_barang->tampil_data_cari($cari)->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_invoice($id_invoice)
    {
        $data['title'] = 'Detail Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_invoice', $data);
        $this->load->view('templates/footer');
    }
}