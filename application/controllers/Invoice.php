<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require_once(dirname(__FILE__) ,'/assets/vendor/autoload.php')
require_once(dirname(__DIR__) . '/vendor/autoload.php');

use Dompdf\Dompdf;

class Invoice extends CI_Controller
{
    //Show admin dashboard
    public function index()
    // {public function showpro()
    {
        $id = $this->input->get('id');
        // dd($id);
        $data = $this->User_model->showproduct($id);
        // dd($data->name);
        $dompdf = new Dompdf();
        // dd($data);
        $name = $data->name;
        $desc = $data->desc_prod;
        $type = $data->Prod_type;
        $sub_type = $data->sub_name;
        $price = $data->price;
        $quant = $data->quantity;

        $html =
            "<h3>invoice</h3></br>
        <h4>Product Name: $name </h4></br>
        <p>Product Desc :  $desc</p>
        <p>Product Desc :  $price</p>
        <p>Product Desc :  $quant</p>
        <p>Product Desc :  $type</p>
        <p>Product Desc :  $sub_type</p>
";

        // echo $ht;
        // dd($data->name);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream($name);
        redirect(base_url('show'));
    }
}
