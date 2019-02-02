<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public static $table = "tbl_admin";

    public function select($where = [], $order = [])
    {

    }

    public function get($limit, $offset, $where = [], $order = [])
    {
        $this->select($where, $order);
        return $this->db->get(self::$table, $limit, $offset)->result();
    }

    public function login($username, $password)
    {
        $this->db->where('email_admin', $username);

        $data_admin = $this->db->get(self::$table)->row();

        if ($data_admin !== null) {
            $this->db->where("email_admin", $data_admin->email_admin);
            $this->db->where("password_admin", md5($password));
            return $this->db->get(self::$table)->row();
        } else {
            return null;
        }
    }

    public function set($data)
    {
        return $this->db->insert(self::$table, $data);
    }

    public function put($id, $data)
    {
        $this->db->where("id_admin", $id);
        return $this->db->update(self::$table, $data);
    }

    public function del($id)
    {
        $this->db->where("id_admin", $id);
        return $this->db->delete(self::$table);
    }

}
