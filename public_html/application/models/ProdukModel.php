<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProdukModel extends CI_Model
{
    public static $table = "tbl_produk";

    public function select($params = [])
    {
        $this->db->join(KategoriModel::$table, KategoriModel::$table . '.id_kategori = ' . self::$table . '.id_kategori', 'left');
    }

    public function get($id = false, $limit = false, $offset = false, $params = [])
    {
        $this->select($params);

        if ($id) {
            $this->db->where(self::$table.".id_produk", $id);
        }

        if ($id) {
            return $this->db->get(self::$table)->row();
        } else {
            return $this->db->get(self::$table, $limit, $offset)->resutl();
        }
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
