<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends Admin
{

    public function index()
    {
        $this->blade->view('admin/setting/index');
    }

}
