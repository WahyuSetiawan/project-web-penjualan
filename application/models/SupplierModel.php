<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SupplierModel extends CI_Model
{
    public static $table = "tbl_supplier";

    public function select()
    {

    }

    public function get($id = false, $limit = false, $offset = false)
    {
        if ($id) {
            $this->db->where(self::$table . ".id_supplier", $id);
        }

        if ($id) {
            return $this->db->get(self::$table)->row();
        } else {
            return $this->db->get(self::$table, $limit, $offset)->result();
        }
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function put($id, $data)
    {
        $this->db->where("id_supplier", $id);
        return $this->db->update(self::$table, $data);

    }

    public function del($id)
    {
        $this->db->where("id_supplier", $id);
        $this->db->delete(self::$table);

        return $this->db->affected_rows();
    }
}

/* End of file SupplierModel.php */
