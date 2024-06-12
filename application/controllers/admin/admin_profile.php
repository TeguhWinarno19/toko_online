<?php

class Admin_profile extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Admin Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('user_management/admin',$data);
        $this->load->view('templates_admin/footer',$data);
    }
}