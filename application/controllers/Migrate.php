<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{

    public function index()
    {
        $this->load->library("migration");

        $status_migratio = ($this->migration->current() === false);

        if ($status_migratio) {
            show_error($this->migration->error_string());
        }

        var_dump($status_migratio);
    }
}

/* End of file Controllername.php */
