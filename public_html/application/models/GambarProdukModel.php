<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GambarProdukModel extends CI_Model
{
    public static $table = "tbl_gambar_produk";

    public function select($params = [], $order = [])
    {
        if (isset($params['id_produk'])) {
            $this->db->where(self::$table . ".id_produk", $params['id_produk']);
        }
    }

    public function get($id = false, $limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params);

        if ($id) {
            $this->db->where("id_gambar_produk", $id);
            return $this->db->get(self::$table)->row();
        } else {
            return $this->db->get(self::$table, $limit, $offset)->result();
        }

    }

    public function set($data)
    {
        return $this->db->insert(self::$table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where("id_gambar_produk", $id);
        return $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where("id_gambar_gambar", $id);
        return $this->db->delete(self::$table);
    }

    public function count($params = [])
    {
        $this->select($params);

        return $this->db->get(self::$table)->num_rows();
    }
}

/* End of file GambarProdukModel.php */
