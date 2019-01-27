<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModel extends CI_Model
{
    public static $table = "tbl_produk";

    public function select($params = [], $order = [])
    {
        $or = "";

        foreach ($order as $index => $sort) {
            if ($index <= 0) {
                $or .= "$sort";
            } else {
                $or .= ",$sort";
            }
        }

        if (isset($params['id_kategori'])) {
            $this->db->where(self::$table . ".id_kategori", $params['id_kategori']);
        }

        $this->db->order_by($or);

        $this->db->join(KategoriModel::$table, KategoriModel::$table . '.id_kategori = ' . self::$table . '.id_kategori', 'left');
    }

    public function get($id = false, $limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        if ($id) {
            $this->db->where(self::$table . ".id_produk", $id);
            
            return $this->db->get(self::$table)->row();
        } else {
            return $this->db->get(self::$table, $limit, $offset)->result();
        }
    }

    public function set($data)
    {
        $this->db->insert(self::$table, $data);
        return $this->db->last_query();
    }

    public function put($id, $data)
    {
        $this->db->where("id_produk", $id);
        return $this->db->update(self::$table, $data);

    }

    public function del($id)
    {
        $this->db->where("id_produk", $id);
        return $this->db->delete(self::$table);
    }

    public function count($params = [], $order = [])
    {
        $this->select($params, $order);

        return $this->db->get(self::$table)->num_rows();
    }

}
