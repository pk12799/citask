<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends CI_Controller
{
    public function index()
    {
        // if ($this->input->is_ajax_request()) {
        //     $type = $this->input->get('sub_name');
        //     $search = $this->input->get('search')['value'];
        //     $start = $this->input->get('start');
        //     $limit = $this->input->get('length');
        //     print_r($search);
        //     $data = $this->User_model->get_subtype($start, $limit);
        //     // dd($data);



        //     echo  json_encode($data);
        // }
        if ($this->input->is_ajax_request()) {
            $start = $this->input->get('start');
            $legnth = $this->input->get('length');
            $coulmn = $this->input->get('order')[0]['column'];
            $ascc = $this->input->get('order')[0]['dir'];;
            $search =  $this->input->get('search')['value'];
            $users = $this->db->select('subtype.*');
            $count = $this->db->query('select * from subtype')->num_rows();

            if (!empty($search)) {
                $where = "( sub_name LIKE '%" . $search . "%')";
                $users->where($where);
            }
            $selected_count = $users->get('subtype')->num_rows();



            $list = $users->limit($legnth, $start)->get('subtype')->result();

            if (count($list) > 0) {
                // assigned.edit
                foreach ($list as $key => $value) {
                    $nestedData[0] = $start + $key + 1;
                    $nestedData[1] = $value->sub_name;
                    $nestedData[2] = $value->type_id;

                    $data[] = $nestedData;
                }

                $json_data = array(
                    "recordsTotal"    => $count,
                    "recordsFiltered" => $selected_count,
                    "data"            => $data
                );
            } else {
                $json_data = array(
                    "recordsTotal"    => 0,
                    "recordsFiltered" => 0,
                    "data"            => []
                );
            }
            echo json_encode($json_data);
            exit;
        }



        //$this->load->view('addsubtype');
    }
}
