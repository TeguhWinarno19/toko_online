<?php

class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        is_logged_in2();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('user_management/user',$data);
        $this->load->view('templates/footer',$data);
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('user_management/edit',$data);
            $this->load->view('templates/footer',$data);
        }else{
            $name   = $this->input->post('name');
            $email  = $this->input->post('email');
            $upload_image = $_FILES['image']['name'];
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2040';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH.'assets/img/profile/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert
                alert-success" role="alert">Update Profile Success</div>');
                redirect('user');
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password','Current Password','required|trim');
        $this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2','Confirm Password','required|trim|min_length[3]|matches[new_password1]');
        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('user_management/Changepassword',$data);
            $this->load->view('templates/footer',$data);
        }
        else {
            $current_password   = $this->input->post('current_password');
            $new_password       = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert">Wrong Password</div>');
                redirect('user/changepassword');
            } else {
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert">New Password cannot same!</div>');
                    redirect('user/changepassword');
                }
                else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert
                    alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
    public function invoice()
    {
        $data['title'] = 'Invoice | cake longue';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $data['invoice'] = $this->model_invoice->tampil_data_user($data["user"])->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('invoice_user', $data);
        $this->load->view('templates/footer', $data);
    }
    public function cetak_pdf_user($id_invoice) 
    {
        $data['title'] = 'Invoice Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->library('pdfgenerator');
        $this->pdfgenerator->generate($this->load->view('cetak_invoice_user', $data, true), "Semua_Invoice", 'A4', 'Potrait');
    }
    public function panduan_pembayaran(){
        $data['title'] = 'Invoice Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('panduan_bayar', $data);
        $this->load->view('templates/footer', $data);
    }
}