<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->session->userdata('email'))
        {
            if ($this->session->userdata('role_id') == 1) {
                redirect('kasir');
            }else if($this->session->userdata('role_id') == 2){
                redirect('bendahara');
            }else{
                redirect('auth/logout');
            }
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login page';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi lolos
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user=$this->db->get_where('user', ['email'=> $email])->row_array();

        if($user)
        {
            if($user['is_active']==1){
                // cek password
                if (password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1){
                        redirect('kasir');
                    }else if($user['role_id'] == 2){
                        redirect('bendahara');
                    }
                }else{
                    alert_danger('Password anda salah');
                    redirect('auth');                       
                }
                
            }else{
                alert_danger('Email anda belum diaktivasi. Hubungi operator untuk meminta aktivasi akun!');
                redirect('auth');
            }

        }else{
            alert_danger('Email tidak terdaftar');
            redirect('auth');
        }
    }

    public function registration()
    {
        if($this->session->userdata('email'))
        {
            redirect('user');
        }
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Passoword', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'picture' => 'default.jpg', 
                'role_id' => 1, 
                'is_active' => 1,
                'is_deleted' => 0,
                'date_created' => time(),
            ];
            $this->db->insert('user', $data);

            alert_success('Akun berhasil dibuat, silahkan login dengan akun tersebut.');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        alert_success('Anda berhasil Logout');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}
