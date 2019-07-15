<?php

class Tools extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // // can only be called from the command line
        // if (!$this->input->is_cli_request()) {
        //     exit('Direct access is not allowed. This is a command line tool, use the terminal');
        // }

        $this->load->dbforge();
    }

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }
    }
}
