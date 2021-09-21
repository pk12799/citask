<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addtype extends CI_Controller
{
    public function index()
    {
        $type['type'] = $this->User_model->get_type('type');

        $this->load->view('addprodtype', $type);
    }
    public function atype()
    {
        $this->form_validation->set_rules('Prod_type', 'Productr Type', 'trim|required|is_unique[type.Prod_type]', array('required' => 'please fill ', 'is_unique' => 'Type name should be unique'));
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('addtype'));
        } else {
            $data = $this->input->post();
            unset($data['Addtype']);
            print_r($data);
            $this->User_model->insert_data('type', $data);
            redirect(base_url('addtype'));
        }
    }
    public function astype()
    {
        $type['type'] = $this->User_model->get_type('subtype');

        $this->load->view('addsubtype', $type);
        $this->form_validation->set_rules('sub_name', 'Productr Type', 'trim|required|is_unique[type.Prod_type]', array('required' => 'please fill ', 'is_unique' => 'Type name should be unique'));
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('addtype'));
        } else {
            $data = $this->input->post();
            unset($data['Addtype']);
            print_r($data);
            $this->User_model->insert_data('subtype', $data);
            redirect(base_url('astype'));
        }
    }
}
