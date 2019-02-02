<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailKategoriModel extends CI_Model
{

    public static $table = "tbl_detail_kategori";

    public function select($params = [], $order = [])
    {
        if (isset($params['id_produk'])) {
            $this->db->where(self::$table . ".id_produk", $params['id_produk']);
        }

    }

    public function get($id = false, $limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        if ($id) {
            $this->db->where("id_detail_kategori", $id);
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
        $this->db->where("id_detail_kategori", $id);
        return $this->db->update(self::$table, $data);
    }

    public function del($id = false, $params = [])
    {
        if ($id) {
            $this->db->where("id_detail_kategori", $id);
        }

        if (isset($params['id_produk'])) {
            $this->db->where("id_produk", $params['id_produk']);
        }

        if (isset($params['id_kategori'])) {
            $this->db->where("id_kategori", $params['id_kategori']);
        }

        return $this->db->delete(self::$table);
    }

    public function count($params = [])
    {
        $this->select($params);
        return $this->db->get(self::$table)->num_rows();
    }
}

/* End of file DetailKategoriModel.php */
