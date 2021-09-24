<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Singout extends CI_Controller
{
    //Show admin dashboard
    public function index()
    {

        unset($_SESSION['login']);
        $this->session->sess_destroy;
        redirect(base_url());
    }
}
