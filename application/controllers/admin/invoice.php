<?php
class Invoice extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Invoice | Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');

    }

    public function detail($id_invoice)
    {
        $data['title'] = 'Detail Invoice | Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }
    public function confirm($id)
    {
        $data = array(
            'status'    => 1,
        );
        $where = array(
            'id' => $id
        );
        $this->model_user->update_data($where,$data,'tb_invoice');
        redirect('admin/invoice');
    }
    public function cetak_semua_pdf() 
    {
        $this->load->library('pdfgenerator');
        $data['invoices'] = $this->model_invoice->get_all_invoices('tb_invoice');
        $data['pesanan'] = $this->model_invoice->get_all_invoices('tb_pesanan');
        $this->pdfgenerator->generate($this->load->view('admin/cetak_invoice', $data, true), "Semua_Invoice", 'A4', 'Potrait');
    }
    public function cetak_pdf_user($id_invoice) 
    {
        $data['title'] = 'Invoice Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->library('pdfgenerator');
        $this->pdfgenerator->generate($this->load->view('cetak_invoice_user', $data, true), "Semua_Invoice", 'A4', 'Potrait');
    }
    
}