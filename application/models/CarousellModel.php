<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CarousellModel extends CI_Model
{

    public static $table = "tbl_carousell";

    public function select($where = [], $params = [])
    {

    }

    public function get($limit = false, $offset = false, $where = [], $params = [])
    {
        return $this->db->get(self::$table, $limit, $offset)->result();
    }

    public function getSingle($id)
    {
        $this->db->where("id_carousell", $id);
        return $this->db->where(self::$table)->row();
    }

    public function set($data)
    {
        return $this->db->insert(self::$table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where("id_carousell", $id);
        return $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where("id_carousell", $id);
        return $this->db->delete(self::$table);
    }

}

/* End of file Carousell.php */
