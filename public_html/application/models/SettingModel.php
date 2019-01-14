<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SettingModel extends CI_Model
{
    public $table = "tbl_settings";

    public function select()
    {

    }

    public function get($id = false, $limit = false, $offset = false)
    {
        if ($id) {
            $this->db->where("setting", $id);
        }

        return $this->db->get($this->table, $limit, $offset)->result_array();
    }

    public function set($data)
    {
        $this->db->insert($data);

        return $this->db->last_query();
    }

    public function put($id)
    {
        $this->db->where("id", $id);

        return $this->db->update($data);
    }

    public function del()
    {
        $this->db->where("id", $id);

        return $this->db->delete($data);
    }
}
