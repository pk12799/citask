<?php
class User_model extends CI_Model
{
    //insert function $tb is table name and $data is data for insertion
    public function insert_data($tb, $data)
    {
        $this->db->insert($tb, $data);
    }
    //select function for geetin data for login
    public function get_data($data)
    {

        $userInfo = $this->db->where('username', $data['username'])->get('users')->row();
        if (!empty($userInfo)) {
            return $userInfo;
        } else {
            return false;
        }
    }
    //to get all no of data
    public function total()
    {
        $total['product'] = $this->db->get('product')->num_rows();
        $total['type'] = $this->db->get('type')->num_rows();
        $total['subtype'] = $this->db->get('subtype')->num_rows();
        $total['users'] = $this->db->get('users')->num_rows();
        return $total;
    }
    //get types and subtype
    public function get_type($data)
    {
        $data = $this->db->get($data);
        return $data->result();
    }

    public function get_subtype()
    {
        return  $this->db->select('subtype.*,type.Prod_type as typeName')
            ->from('subtype')
            ->join('type', 'type.id = subtype.type_id', 'left')
            ->get()->result();
    }
    //delete the type 
    public function deletedata($tb, $id)
    {
        $this->db->where('id', $id);
        $res =  $this->db->delete($tb);
        return $res;
    }

    //Add products
    public function addproducts($data)
    {
        $this->db->insert('product', $data);
        $id  = $this->db->insert_id();
        return $id;
    } //Add images
    public function do_uploads($data)
    {

        $this->db->insert('images', $data);
        return true;
    }
    public function showprod()
    {
        $data = $this->db->query('SELECT product.id, product.name, product.desc_prod, product.quantity, product.price, type.Prod_type, subtype.sub_name FROM product left join `subtype` on product.sub_id = subtype.id LEFT JOIN type on type.id = product.type_id ');


        $res = $data->result();
        // $image = $this->db->query('SELECT images.i_name, product.id from images left join product on product.id = images.prod_id ');
        // $images = $image->result();

        return $res;
    }
    public function images()
    {
        $image = $this->db->query('SELECT images.i_name,images.prod_id, product.id from images left join product on product.id = images.prod_id ');
        $images = $image->result();
        //print_r($images);

        return $images;
    }
    public function deleteimage($tb, $id)
    {
        $this->db->where('prod_id', $id);
        $res =  $this->db->delete($tb);
        return $res;
    }
    public function totalprod()
    {
        return $this->db->count_all('product');
    }
}
