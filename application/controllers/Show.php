<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Show extends CI_Controller
{
    //Show admin dashboard
    public function index()
    {
        $data['prod'] = $this->User_model->showprod();
        $data['img'] = $this->User_model->images();
        $data['count'] = $this->User_model->totalprod();
        // // $datas = array($data, $res);
        // print_r($data);
        // exit;
        // print_r($data);
        // exit;

        $this->load->view('showproducts', $data);
    }
    // $imag['img'] = $this->Show->images($prod_id);
    // public function images($p_id)
    // {
    //     print_r($p_id);
    //     exit;
    // }
    //$CI->images($pd->$id);
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
    // public function page()
    // {
    //     if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    //         $page_no = $_GET['page_no'];
    //     } else {
    //         $page_no = 1;
    //     }
    //     $total_records_per_page = 3;
    //     $offset = ($page_no - 1) * $total_records_per_page;
    //     $previous_page = $page_no - 1;
    //     $next_page = $page_no + 1;
    //     $adjacents = "2";

    //     //$total_records = mysqli_fetch_array($result_count);
    //     //$total_records = $total_records['total_records'];
    //     //$total_no_of_pages = ceil($total_records / $total_records_per_page);
    //     //$second_last = $total_no_of_pages - 1;
    // }
}
