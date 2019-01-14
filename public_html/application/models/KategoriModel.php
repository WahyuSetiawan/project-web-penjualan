<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{

    public static $table = "tbl_produk_kategori";

    public function select()
    {

    }

    public function get($id = false, $limit = false, $offset = false)
    {
        if ($id) {
            $this->db->where(self::$table.".id_kategori", $id);
        }

        return $this->db->get(self::$table, $limit, $offset)->result_object();
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
        return $this->db->last_query();
    }

    public function put($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update(self::$table, $data);

    }

    public function del($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete(self::$table);
    }

}

/* End of file KategoriModel.php */
