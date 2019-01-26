<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KonsumenModel extends CI_Model
{
    public static $table = "tbl_konsumen";

    public function get($limit = false, $offset = false, $id = false, $params = [])
    {

        if ($id) {
            $this->db->where('id_konsumen', $id);

            return $this->db->get(self::$table)->row();

        } else {
            return $this->db->get(self::$table, $limit, $offset)->result();

        }
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where('id_konsumen', $id);
        $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where('id_konsumen', $id);
        $this->db->delete(self::$table);
    }
    
    public function login($username, $password)
    {

        $password = md5($password);

        $this->db->where('email_konsumen', $username);

        $data_username = $this->db->get(self::$table)->row();

        if (isset($data_username)) {
            $this->db->where('email_konsumen', $username);
            $this->db->where('password_konsumen', $password);
            $data_konsumen = $this->db->get(self::$table)->row();

            return (isset($data_konsumen)) ? $data_konsumen : false;
        }

        return false;
    }
}

/* End of file KosumenModel.php */