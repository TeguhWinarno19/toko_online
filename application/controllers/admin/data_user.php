<?php

class Data_user extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Data Barang | Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_user->tampil_data()->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates_admin/footer');
    }
    public function edit($id)
    {
        $where = array('id' =>$id);
        $data['title'] = 'Edit Data | Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_user->edit_user($where, 'user')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/edit_user', $data);
        $this->load->view('templates_admin/footer');
    }
    public function update()
    {
        $id                 = $this->input->post('id');
        $name               = $this->input->post('name');
        $email              = $this->input->post('email');
        $data = array(
            'name'      => $name,
            'email'    => $email,
        );
        $where = array(
            'id' => $id
        );
        $this->model_user->update_data($where,$data,'user');
        redirect('admin/data_user/index');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_user->hapus_data($where, 'user');
        redirect('admin/data_user/index');
    }

}