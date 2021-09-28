<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        //htis->load->library('form_validation');
        $this->load->view('login');
    }


    public function getUser()
    {
        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == TRUE) {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $pass =  $data['password'];


            $checkUser = $this->User_model->get_data($data);

            if (!$checkUser) {
                $this->session->set_flashdata('error', "NO user found");
                redirect(base_url('login'));
            }
            // print_r(password_hash($pass, PASSWORD_DEFAULT));
            // echo '<pre>';
            // print_r($checkUser->password);
            // exit;
            //print_r(password_hash($pass, PASSWORD_DEFAULT));
            if (!password_verify($pass, $checkUser->password)) {
                $this->session->set_flashdata('error', "Invalid password or email");
                redirect(base_url('login'));
            }
            $this->session->login = TRUE;
            $this->session->user = $checkUser->username;

            $this->session->set_flashdata('success', "Success");
            redirect(base_url('dashboard'));
        }
    }
}
