<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['flashdata'] = $this->session;
    }

    public function index()
    {

    }

}
