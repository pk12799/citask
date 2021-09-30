<?php
defined('BASEPATH') or exit('No direct script access allowed');
//Add type and sub type controller
class Addtype extends CI_Controller
{
    public function index()
    {
        $type['type'] = $this->User_model->get_type('type');

        $this->load->view('addprodtype', $type);
    }
    //Add type in  type table
    public function atype()
    {


        $this->form_validation->set_rules('Prod_type', 'Productr Type', 'trim|required|is_unique[type.Prod_type]', array('required' => 'please fill ', 'is_unique' => 'Type name should be unique'));
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('atype'));
        } else {
            $data = $this->input->post();
            unset($data['Addtype']);
            print_r($data);
            $this->User_model->insert_data('type', $data);
            redirect(base_url('atype'));
        }
    }
    //show all sub type from database
    public function showsub()
    {

        $data['type'] = $this->User_model->get_type('type');
        $data['sub'] = $this->User_model->get_subtype();

        $this->load->view('addsubtype', $data);
    }

    //add sub type on database
    public function astype()
    {
        $this->form_validation->set_rules('type_id', 'Producte Type', 'trim|required', array('required' => 'please fill'));
        $this->form_validation->set_rules('sub_name', 'Producte Type', 'trim|required|is_unique[subtype.sub_name]', array('required' => 'please fill ', 'is_unique' => 'Type name should be unique'));
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
    //delete the type from type table
    public function deletedata()
    {

        $id = $this->input->get('id');

        $res = $this->User_model->deletedata('type', $id);

        if ($res) {
            redirect(base_url('atype'));
        } else {
            $this->session->set_flashdata('error', 'this can not be delete');
            redirect(base_url('atype'));
        }
    }
    //add products in db
    public function addproduct()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('type_id', 'Type', 'required');
        $this->form_validation->set_rules('desc_prod', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
        // $this->form_validation->set_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('aprod'));
        } else {
            $data = $this->input->post();
            unset($data['Add_prod']);
        }
    }
    //get product type and sub type
    public function addproductp()
    {

        $ptype['sub'] = $this->User_model->get_type('type');
        $type['type'] = $this->User_model->get_type('subtype');

        $data['ptype'] = $ptype;
        $data['type'] = $type;
        $this->load->view('addproduct', $data);
    }
}
