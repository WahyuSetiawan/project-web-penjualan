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

        return $this->db->get($this->table, $limit, $offset)->result();
    }

    public function set($data)
    {
        $this->db->insert($this->table,$data);

        return $this->db->last_query();
    }

    public function update($setting, $value)
    {
        $this->db->where("setting", $setting);

        $row = $this->db->get($this->table)->row();

        if ($row == null) {
            $this->db->insert($this->table,["setting" => $setting, "value" => $value]);

        } else {
            $this->db->where("setting", $setting);

            $this->db->update($this->table,["value" => $value]);
        }
    }

    public function put($id)
    {
        $this->db->where("id", $id);

        return $this->db->update($this->table,$data);
    }

    public function del()
    {
        $this->db->where("id", $id);

        return $this->db->delete($data);
    }
}
