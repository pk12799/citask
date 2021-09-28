<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
    //Show admin dashboard
    public function index()
    {

        $this->load->view('emails');
    }
    public function sendemail()
    {
        $this->form_validation->set_rules('to', 'Reciver', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('email'));
        } else {
            $this->load->library('email');

            $config = array(
                'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                'smtp_host' => 'smtp.mailtrap.io',
                'smtp_port' => 465,
                'smtp_user' => 'c8f5171290d36a',
                'smtp_pass' => 'e7605b81c1c348',
                //can be 'ssl' or 'tls' for example
                'mailtype' => 'html', //plaintext 'text' mails or 'html'
                'smtp_timeout' => '4', //in seconds
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );
            $config['newline']    = "\r\n";
            $to =  $this->input->post('to');
            $sub = $this->input->post('subject');

            $desc = $this->input->post('desc');

            $this->email->initialize($config);
            //  $this->load->library('email');

            $this->email->from('parvezkhan12799@gmail.com', 'parvez khan');

            $this->email->to($to);
            $this->email->subject($sub);

            $this->email->message($desc);
            // $temp = $_FILES["upload"]["tmp_name"];
            // $fil = $_FILES["upload"]["name"];

            // print_r($fil, $temp);
            // var_dump($_FILES['upload']['name']);
            // if (!empty($_FILES['upload'])) {
            //     $this->email->attach($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);
            // }
            // $this->email->attach(base_url('assets/uploads/csdx_c.jpeg'));

            if ($this->email->send()) {
                echo 'Your Email has successfully been sent.';
                // show_error($this->email->print_debugger());
            } else {
                show_error($this->email->print_debugger());
            }
        }
    }
}
