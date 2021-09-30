<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Updatepro extends CI_Controller
{
    //Show admin dashboard
    public function index()
    // {public function showpro()
    {
        $id = $this->input->get('id');

        $data['prods'] = $this->User_model->showproduct($id);
        $data['type'] = $this->User_model->get_type('type');
        $data['sub'] = $this->User_model->get_type('subtype');
        //$data['img'] = $this->User_model->imagesby($id);

        // dd($data);
        $this->load->view('updatepro', $data);
    }
    public function updateproduct()
    {
        $id = $this->input->get('id');
        // dd($id);
        $this->form_validation->set_rules('name', 'Name', 'required');
        // $this->form_validation->set_rules('type_id', 'Type', 'required');
        $this->form_validation->set_rules('desc_prod', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
        // $this->form_validation->set_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            //redirect(base_url('show'));
        } else {
            $data = $this->input->post();
            unset($data['update_prod']);
            // dd($data);
            $res = $this->User_model->updateproducts($data, $id);
            if ($res) {
                redirect(base_url('show'));
            }
        }
    }
}
