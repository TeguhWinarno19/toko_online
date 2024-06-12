<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email'); //rules form email
        $this->form_validation->set_rules('password','Password', 'trim|required'); //rules form password        
        if($this->form_validation->run() == false)
        {
            $data['title'] = "Login Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
        else
        {
            $this->login();
        }
    }

    private function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();        
        if($user)
        {
            if($user['is_active'] == 1)
            {
                if(password_verify($password, $user['password']))
                {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1)
                    {
                        redirect('admin/dashboard_admin');
                    }
                    else{
                        redirect('dashboard');
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert">Wrong Password!</div>');
                    redirect('auth');    
                }
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert">This Email has not activated!</div>');
                redirect('auth');    
            }
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">Email has not registered!</div>');
            redirect('auth');
            
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'email not valid',
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'min_length' => 'Password too short!',
            'matches' => 'Password dont match'
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sama'
        ]);        
        if( $this->form_validation->run() == false)
        {
            $data['title'] = "Registration Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }
        else {
            {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 1,
                    'date_created' => time()
                ];
                $this->db->insert('user',$data);
                $this->session->set_flashdata('message', '<div class="alert
                alert-success" role="alert">Conratulation your account has been
                created. Please login!</div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert
                alert-success" role="alert">You have been logged out!</div>');
                redirect('auth');
        
    }
    public function blocked()
    {
        $data['title'] = 'Blocked';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('auth/blocked', $data);
        $this->load->view('templates/footer', $data);
    }
}