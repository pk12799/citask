<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		//this->load->library('form_validation');
		$this->load->view('register');
		//$this->load->view('nav');
	}
	public function insert_data()
	{
		$this->form_validation->set_rules('fname', 'Full name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.username]', array('is_unique' => 'it is not unioque '));
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile No', array('trim', 'required', 'min_length[10]', 'max_length[10]', 'regex_match[/^[6-9]\d{9}$/]', 'is_unique[users.mobileno]'));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('welcome'));
		} else {
			$data['fname'] = $this->input->post('fname');
			$data['username'] = $this->input->post('email');
			$pass = $this->input->post('password');
			$cpass = $this->input->post('cpassword');
			$data['mobileno'] = $this->input->post('mobile');
			if ($pass == $cpass) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$data['status'] = 1;
				$this->User_model->insert_data('users', $data);
				//$this->session->set_flashdata('success', "Success");
				redirect(base_url('login'));
			} else {
				$this->session->set_flashdata('error', 'password and Confirm password does not match ');
				redirect(base_url('welcome'));
			}
		}


		//print_r($_POST);
	}
}
