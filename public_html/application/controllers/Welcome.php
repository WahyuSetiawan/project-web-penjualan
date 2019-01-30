<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
            echo $this->router->fetch_module();
    }

}

/* End of file Welcome.php */
