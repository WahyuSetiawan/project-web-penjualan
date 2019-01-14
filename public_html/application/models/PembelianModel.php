<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PembelianModel extends CI_Model
{
    public static $table = "tbl_pembelian";

    public function select()
    {
        $this->db->join(ProdukModel::$table, ProdukModel::$table . '.id_produk = ' . self::$table . '.id_produk', 'left');
        $this->db->join(SupplierModel::$table, SupplierModel::$table . '.id_supplier = ' . self::$table . '.id_supplier', 'left');
    }

    public function get($id = false, $limit = false, $offset = false, $params = [])
    {
        if ($id) {
            $this->db->where(self::$table . ".id_pembelian", $id);
        }

        if ($id) {
            return $this->db->get(self::$table)->result();
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
        $this->db->where("id_pembelian", $id);
        return $this->db->update(self::$table, $data);

    }

    public function del($id)
    {
        $this->db->where("id_pembelian", $id);
        return $this->db->delete(self::$table);
    }
}

/* End of file PembelianModel.php */
