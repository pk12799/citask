<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Show extends CI_Controller
{
    //Show admin dashboard
    public function index()
    {


        //   $data['prod'] = $this->User_model->showprod();
        // $data['img'] = $this->User_model->images();
        // init params
        $params = array();
        $limit_per_page = 3;
        $start_index = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $total_records = $this->User_model->totalprod();



        if ($total_records > 0) {
            // get current page records
            $params["results"] = $this->User_model->showprod($limit_per_page, $start_index);

            $config['base_url'] = base_url() . 'show';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 2;
            $config['page_query_string'] = true;
            //pagination
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="";">';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['next_tag_open'] = '<li class="pg-next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="pg-prev">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $this->pagination->initialize($config);

            // build paging links
            $params["links"] = $this->pagination->create_links();
        }

        $this->load->view('showproducts', $params);
    }

    public function deletedata()
    {

        $id = $this->input->get('id');

        $res = $this->User_model->deleteimage('images', $id);
        if ($res) {
            $res = $this->User_model->deletedata('product', $id);

            redirect(base_url('showprod'));
        } else {
            $this->session->set_flashdata('error', 'this can not be delete');
            redirect(base_url('showprod'));
        }
    }

    public function showpro()
    {
        $id = $this->input->get('id');

        $data['prods'] = $this->User_model->showproduct($id);
        $data['img'] = $this->User_model->imagesby($id);


        $this->load->view('showproduct', $data);
    }
}
