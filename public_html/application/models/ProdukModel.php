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

            $data = $this->db->get(self::$table)->row();

            $data->gambar_lain = [];
            $data->kategori = [];

            $data->gambar_lain = $this->gambarProdukModel->get(false, false, false, ['id_produk' => $data->id_produk]);
            $data_kategori = $this->detailKategoriModel->get(false, false, false, ['id_produk' => $data->id_produk]);

            foreach ($data_kategori as $key => $value_kategori) {
                $data->kategori[$value_kategori->id_kategori] = $value_kategori;
            }

            return $data;
        } else {
            $data = $this->db->get(self::$table, $limit, $offset)->result();

            foreach ($data as $key => &$value) {
                $value->gambar_lain = [];
                $value->kategori = [];

                $value->gambar_lain = $this->gambarProdukModel->get(false, false, false, ['id_produk' => $value->id_produk]);
                $data_kategori = $this->detailKategoriModel->get(false, false, false, ['id_produk' => $value->id_produk]);

                foreach ($data_kategori as $key => $value_kategori) {
                    $value->kategori[$value_kategori->id_kategori] = $value_kategori;
                }
            }

            return $data;
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
