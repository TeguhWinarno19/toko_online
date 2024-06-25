<?php

class Admin_profile extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
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
    public function changepassword()
    {
        $data['title'] = 'Change Password Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password','Current Password','required|trim');
        $this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2','Confirm Password','required|trim|min_length[3]|matches[new_password1]');
        if($this->form_validation->run() == false){
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('admin/changepassword',$data);
            $this->load->view('templates_admin/footer',$data);
        }
        else {
            $current_password   = $this->input->post('current_password');
            $new_password       = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert">Wrong Password</div>');
                redirect('admin/admin_profile/changepassword');
            } else {
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert">New Password cannot same!</div>');
                    redirect('admin/admin_profile/changepassword');
                }
                else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert
                    alert-success" role="alert">Password changed!</div>');
                    redirect('admin/admin_profile/changepassword');
                }
            }
        }
    }
}