<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
    //Show admin dashboard
    public function index()
    {

        $this->load->view('emails');
    }
}
