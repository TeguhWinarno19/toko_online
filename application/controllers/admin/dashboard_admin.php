<?php
class Dashboard_admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->model_user->tampil_data()->result();
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer',$data);
    }
}