<?php
class User_model extends CI_Model
{
    public function insert_data($tb, $data)
    {
        $this->db->insert($tb, $data);
    }
    public function get_data($data)
    {

        $userInfo = $this->db->where('username', $data['username'])->get('users')->row();
        if (!empty($userInfo)) {
            return $userInfo;
        } else {
            return false;
        }
    }
    public function get_type($data)
    {
        $data = $this->db->get($data);
        return $data->result();
    }
}
