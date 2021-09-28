<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addproduct extends CI_Controller
{
    public function index()
    {

        $ptype['type'] = $this->User_model->get_type('type');
        $type['sub'] = $this->User_model->get_type('subtype');

        $data['ptype'] = $ptype;
        $data['type'] = $type;
        $this->load->view('addproduct', $data);
    }
    //Add Products
    public function addproductin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('type_id', 'Type', 'required');
        $this->form_validation->set_rules('desc_prod', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
        // $this->form_validation->set_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('Addprod'));
        } else {
            $data = $this->input->post();
            unset($data['Add_prod']);
            print_r($data);
            $res = $this->User_model->addproducts($data);
            //Add images of product
            if ($res) {
                $count = count($_FILES['upload_images']['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (!empty($_FILES['upload_images']['name'][$i])) {
                        $_FILES['file']['name'] = $_FILES['upload_images']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['upload_images']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['upload_images']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['upload_images']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['upload_images']['size'][$i];

                        $config['upload_path'] = './assets/uploads/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $_FILES['upload_images']['name'][$i];

                        // print_r($_FILES['upload_images']['name'][$i]);
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        //upload image in local
                        if ($this->upload->do_upload('file')) {
                            $uploadData = $this->upload->data();

                            $file = array(
                                'i_name' => $uploadData['file_name'],
                                'prod_id' => $res
                            );

                            $this->User_model->do_uploads($file);
                        } else {
                            echo 'fail';
                        }
                    }
                }
            }
            //redirect to addproduct page
            redirect(base_url('Addprod'));
        }
    }
}
