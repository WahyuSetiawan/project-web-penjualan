<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{

    public $table = "tbl_produk_kategori";

   public function select()
    {

    }

    public function get($id = false, $limit = false, $offset = false)
    {
        if ($id) {
            $this->db->where("id", $id);
        }

        return $this->db->get($this->table, $limit, $offset)->result_object();
    }

    public function set($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->last_query();
    }

    public function put($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update($this->table, $data);

    }

    public function del($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->table);
    }

}

/* End of file KategoriModel.php */
