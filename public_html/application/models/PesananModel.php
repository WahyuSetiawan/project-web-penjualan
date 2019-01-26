<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PesananModel extends CI_Model
{

    public static $table = "tbl_pesanan";

    public function select($params = [])
    {
        $this->db->select(self::$table . '.*, ' .
            KonsumenModel::$table . ".*");

        $this->db->join(KonsumenModel::$table, KonsumenModel::$table . '.id_konsumen = ' . self::$table . '.id_konsumen', 'left');

        if (isset($params['id_pesanan'])) {
            $this->db->where(self::$table . ".id_pesanan", $params['id_pesanan']);
        }
    }

    public function get($limit = false, $offset = false, $id_pesanan = false, $params = [])
    {
        $this->select($params);

        if ($id_pesanan) {
            $this->db->where('id_pesanan', $id_pesanan);
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
        $this->db->where("id_pesanan" . $id);
        return $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where("id_pesanaan", $id);
        return $this->db->delete(self::$table);
    }
}

/* End of file PesananModel.php */
