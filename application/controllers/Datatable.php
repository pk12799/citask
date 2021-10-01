<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends CI_Controller
{
    public function index()
    {
        if($this->input->is_ajax_request(){
        $type = $this->input->get('id');
        $id = $this->input->get('');
    }
}
}
