<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewStokModel extends CI_Model
{

    public static $view = 'view_stok_produk';

    public function select($params = [], $order = [])
    {
        $order_string = "";
        
        foreach ($order as $index => $value) {
            if ($index <= 0) {
                $order_string .= "$value";
            } else {
                $order_string .= ",$value";
            }
        }

        $this->db->order_by($order_string);

        $this->db->join(ProdukModel::$table, ProdukModel::$table . ".id_produk = " . self::$view . ".id_produk", "left");
        $this->db->join(KategoriModel::$table, KategoriModel::$table . ".id_kategori = " . ProdukModel::$table . ".id_kategori", "left");
    }

    public function get($id = false, $limit = false, $offset = false, $params = [], $order = [])
    {
        $this->select($params, $order);

        if ($id) {
            $this->db->where(self::$view . ".id_produk", $id);

            return $this->db->get(self::$view)->row();
        } else {
            return $this->db->get(self::$view, $limit, $offset)->result();
        }
    }

    public function count($params = [])
    {
        $this->select($params);

        return $this->db->get(self::$view)->num_rows();
    }

}

/* End of file ViewStokModel.php */
